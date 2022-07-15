<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('__assets/img/user/' . $this->session->userdata['photo']) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user['namauser'] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
                $menus = $this->menu->getMenu();

                foreach ($menus as $menu) :
                    $submenu = $this->menu->getSubmenu($menu->id);
            ?>
                <?php if($submenu) : ?>
                    <li class="treeview">
                        <a href="<?= base_url() ?>" data-target="#collapse<?= $menu->id ?>" aria-expanded="true" aria-controls="collapse">
                            <i class="<?= $menu->icon ?>"></i>
                            <span><?= $menu->title ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="collapse<?= $menu->id ?>">
                            <?php foreach($submenu as $sm) : ?>
                                <li>
                                    <a href="<?= base_url() . $sm->sub_url ?>">
                                        <i class="fa fa-circle-o"></i> <?= $sm->sub_title ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= base_url() . $menu->url ?>">
                        <i class="<?= $menu->icon ?>"></i> <span><?= $menu->title ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach ?>
        </ul>
        
    </section>
</aside>