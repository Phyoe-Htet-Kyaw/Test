<aside class="widget-area" id="secondary">
    <section class="widget widget_search">
        <form class="search-form search-top">
            <label> <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search...">
            </label>
            <button type="submit"> <i class="fas fa-search"></i>
            </button>
        </form>
    </section>
    <section class="widget widget_techvio_posts_thumb">
        <h3 class="widget-title">Popular Posts</h3>
        <?php
            $blog = new Btasks;
            $blog_res = $blog->random1();
            foreach($blog_res as $item){
        ?>
            <article class="item">
                <a href="#" class="thumb"> <span class="fullimage cover bg1" role="img" style="background-image: url(admin/uploads/<?php echo $item->images; ?>); !important"></span>
                </a>
                <div class="info">
                    <span>
                        <?php
                            $s = $item->created_at;
                            $date = strtotime($s);
                            echo date('d/M/Y', $date);
                        ?>
                    </span>
                    <h4 class="title usmall">
                        <a href="#"><?php echo $item->title; ?></a>
                    </h4>
                </div>
            </article>
        <?php
            }
        ?>	
    </section>
    <section class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <?php
                $category = new Ctasks;
                $category_res = $category->show();
                foreach($category_res as $item){
            ?>
                <li> <a href="#"><?php echo $item->name	; ?></a>
                </li>
            <?php
                }
            ?>		
        </ul>
    </section>
    <section class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
            <?php
                $blog = new Btasks;
                $blog_res = $blog->random2();
                foreach($blog_res as $item){
            ?>
                <li> <a href="#"><?php echo $item->title; ?></a>
                </li>
            <?php
                }
            ?>
        </ul>
    </section>
    <section class="widget widget_archive">
        <h3 class="widget-title">Archives</h3>
        <ul>
            <li> <a href="#">June 2021</a>
            </li>
            <li> <a href="#">July 2021</a>
            </li>
            <li> <a href="#">August 2021</a>
            </li>
        </ul>
    </section>
    <section class="widget widget_tag_cloud">
        <h3 class="widget-title">Tags</h3>
        <div class="tagcloud section-bottom">
            <?php
                $tag = new Ttasks;
                $tag_res = $tag->show();
                foreach($tag_res as $item){
                    $b_tag = new Btasks;
                    $b_tag_res = $b_tag->tagCount($item->id);
            ?>
                <a href="#">
                    <?php echo $item->name; ?>
                    <span class="tag-link-count">(<?php echo $b_tag_res->count; ?>)</span>
                </a>
            <?php
                }
            ?>
        </div>
    </section>
</aside>