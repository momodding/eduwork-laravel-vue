<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();
        $total_catalog = Catalog::count();

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('publishers.id')->pluck('publishers.name', 'publishers.id');

        $data_bar = [];
        $label_bar = ['transaction'];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0,9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach (range(1,12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        $data_pie = Book::select(DB::raw("COUNT(catalog_id) as total"))->groupBy('catalog_id')->orderBy('catalog_id', 'asc')->pluck('total');
        $label_pie = Catalog::orderBy('catalogs.id', 'asc')->join('books', 'books.catalog_id', '=', 'catalogs.id')->groupBy('catalogs.id')->pluck('catalogs.name', 'catalogs.id');

        return view('admin.dashboard', compact('total_book', 'total_member', 'total_transaction', 'total_publisher', 'total_catalog', 'data_donut', 'label_donut', 'data_pie', 'label_pie', 'data_bar'));
    }

    public function catalog()
    {

        $data_catalog = Catalog::all();

        return view(admin.catalog.catalog, compact('data_catalog'));
    }

    public function publisher()
    {
        return view('admin.publisher');
    }

    public function author()
    {
        return view('admin.author');
    }
}
