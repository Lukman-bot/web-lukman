            <div class="container pt-4 mt-5">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <?php foreach ($post as $p) : ?>
                            <div class="card post-item bg-transparent border-0 mb-5">
                                <a href="<?= base_url("index.php/Post/Detail/$p->slugpost") ?>">
                                    <img class="card-img-top rounded-0" src="<?= base_url('__assets/img/postingan/' . $p->photo) ?>" alt="">
                                </a>
                                <div class="card-body px-0">
                                    <h2 class="card-title">
                                        <a class="text-white opacity-75-onHover" href="<?= base_url("index.php/Post/Detail/$p->slugpost") ?>"><?= $p->posttitle ?></a>
                                    </h2>
                                    <ul class="post-meta mt-3">
                                        <li class="d-inline-block mr-3">
                                            <span class="fas fa-clock text-primary"></span>
                                            <a class="ml-1" href="#"><?= $p->tglpost ?></a>
                                        </li>
                                        <li class="d-inline-block">
                                            <span class="fas fa-list-alt text-primary"></span>
                                            <a class="ml-1" href="#"><?= $p->categoryname ?></a>
                                        </li>
                                    </ul>
                                    <p class="card-text my-4"><?= character_limiter($p->content,100) ?></p>
                                    <a href="<?= base_url("index.php/Post/Detail/$p->slugpost") ?>" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                                </div>
                            </div>
                            <!-- end of post-item -->
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="widget text-center">
                            <img class="author-thumb-sm rounded-circle d-block mx-auto" src="images/author-sm.png" alt="">
                            <h2 class="widget-title text-white d-inline-block mt-4">About Me</h2>
                            <p class="mt-4">Lorem ipsum dolor sit coectetur adiing elit. Tincidunfywjt leo mi, viearra urna. Arcu ve isus, condimentum ut vulpate cursus por turpis.</p>
                            <ul class="list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="#!" class="text-white text-primary-onHover p-2">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#!" class="text-white text-primary-onHover p-2">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#!" class="text-white text-primary-onHover p-2">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#!" class="text-white text-primary-onHover p-2">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end of author-widget -->

                        <div class="widget">
                            <div class="mb-5 text-center">
                                <h2 class="widget-title text-white d-inline-block">Featured Posts</h2>
                            </div>
                            <div class="card post-item bg-transparent border-0 mb-5">
                                <a href="post-details.html">
                                    <img class="card-img-top rounded-0" src="images/post/post-sm/01.png" alt="">
                                </a>
                                <div class="card-body px-0">
                                    <h2 class="card-title">
                                        <a class="text-white opacity-75-onHover" href="post-details.html">Excepteur ado Do minimal duis laborum Fugiat ea</a>
                                    </h2>
                                    <ul class="post-meta mt-3 mb-4">
                                        <li class="d-inline-block mr-3">
                                            <span class="fas fa-clock text-primary"></span>
                                            <a class="ml-1" href="#">24 April, 2016</a>
                                        </li>
                                        <li class="d-inline-block">
                                            <span class="fas fa-list-alt text-primary"></span>
                                            <a class="ml-1" href="#">Photography</a>
                                        </li>
                                    </ul>
                                    <a href="post-details.html" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                                </div>
                            </div>
                            <!-- end of widget-post-item -->
                            <div class="card post-item bg-transparent border-0 mb-5">
                                <a href="post-details.html">
                                    <img class="card-img-top rounded-0" src="images/post/post-sm/02.png" alt="">
                                </a>
                                <div class="card-body px-0">
                                    <h2 class="card-title">
                                        <a class="text-white opacity-75-onHover" href="post-details.html">Excepteur ado Do minimal duis laborum Fugiat ea</a>
                                    </h2>
                                    <ul class="post-meta mt-3 mb-4">
                                        <li class="d-inline-block mr-3">
                                            <span class="fas fa-clock text-primary"></span>
                                            <a class="ml-1" href="#">24 April, 2016</a>
                                        </li>
                                        <li class="d-inline-block">
                                            <span class="fas fa-list-alt text-primary"></span>
                                            <a class="ml-1" href="#">Photography</a>
                                        </li>
                                    </ul>
                                    <a href="post-details.html" class="btn btn-primary">Read More <img src="images/arrow-right.png" alt=""></a>
                                </div>
                            </div>
                            <!-- end of widget-post-item -->
                        </div>
                        <!-- end of post-items widget -->
                    </div>
                </div>
            </div>