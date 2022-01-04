<!-- Title list Side widget-->
                    <div class="card mb-4">
                        <div class="card-header"><?=$_GET['category'] ?>  titles list</div>
                        <div class="card-body">
                            <ul><?php $category_data = new Post($_GET['category']); $category_data->category_list(); ?></ul>
                        </div>
                    </div>