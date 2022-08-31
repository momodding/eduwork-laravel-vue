<?php $__env->startSection('header', 'Book'); ?>

<?php $__env->startSection('content'); ?>
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search from title"
                        v-model="search">
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Create New Book</button>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
                <div class="info-box" v-on:click="editData(book)">
                    <div class="info-box-content">
                        <span class="info-box-text h3">{{ book.title }} ( {{ book.qty }} )</span>
                        <span class="info-box-number">Rp {{ numberWithSpaces(book.price) }} ,-<small></small></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, book.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" required=""
                                    :value="book.isbn">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required=""
                                    :value="book.title">
                            </div>

                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" class="form-control" name="year" required=""
                                    :value="book.year">
                            </div>

                            <div class="form-group">
                                <label>Created At</label>
                                <input type="text" class="form-control" name="created_at" required=""
                                    :value="book.created_at">
                            </div>

                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control">
                                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option :selected="book.publisher_id == <?php echo e($publisher->id); ?>"
                                            value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control">
                                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option :selected="book.author_id == <?php echo e($author->id); ?>"
                                            value="<?php echo e($author->id); ?>"><?php echo e($author->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control">
                                    <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option :selected="book.catalog_id == <?php echo e($catalog->id); ?>"
                                            value="<?php echo e($catalog->id); ?>"><?php echo e($catalog->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty" required=""
                                    :value="book.qty">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" required=""
                                    :value="book.price">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default bg-danger" v-if="editStatus"
                                v-on:click="deleteData(book.id)">Delete</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        var actionUrl = '<?php echo e(url('books')); ?>';
        var apiUrl = '<?php echo e(url('api/books')); ?>';

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                actionUrl: actionUrl,
                book: {},
                editStatus: false
            },
            mounted: function() {
                this.get_books();
            },
            methods: {
                get_books() {
                    const _this = this;
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function(data) {
                            _this.books = JSON.parse(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
                addData() {
                    this.book = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(book) {
                    this.book = book;
                    this.actionUrl = '<?php echo e(url('books')); ?>' + '/' + book.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    console.log(id);
                    this.actionUrl = '<?php echo e(url('books')); ?>' + '/' + id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {
                            _method: "DELETE"
                        }).then(response => {
                            location.reload();
                        });
                    }
                },
                numberWithSpaces(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
            },
            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/book.blade.php ENDPATH**/ ?>