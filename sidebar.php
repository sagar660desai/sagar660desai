<?php

?>
<div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
        <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
                <ul class="sidenav">

                    <li class="sidenav-heading">Navigation</li>
                   
                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?>
                        <li class="sidenav-item has-subnav active">
                            <a href="" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Project Manager</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li><a href="productmanager.php?insert">Add Manager</a></li>
                                <li><a href="productmanager.php?display">All Manager</a></li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav active">
                            <a href="" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Artist</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li><a href="artist.php?insert">Add Artist</a></li>
                                <li><a href="artist.php?display">All Artist</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if (isset($_SESSION['admin']) or isset($_SESSION['manager'])) {
                        ?>
                      
                       
                            <a href="" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Project</span>
                            </a>
                              <ul class="">
                                <li><a href="addproject.php">Add Project</a></li>
                                <li><a href="allproject.php">All Project</a></li>
                            </ul>
                       
                        <?php
                    }
                    ?>

                </ul>
            </nav>
        </div>
    </div>
</div>