<html>

    <head>
        <link rel='stylesheet' href='profile.css'>
        <script src='profile.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>Musity - <?php echo e($user->name); ?></title>
    </head>

    <body>
    <div id="overlay">
    </div>
        <header>
            <nav>
                <div class="nav-container">
                    <div id="logo">
                         Musity
                    </div>
                    <div id="links">
                        <a href='/home'>HOME</a>
                        <a>DISCOVER</a>
                        <a>ABOUT</a>
                        <a>CONTACT</a>
                        <div id="separator"></div>
                        <a href='/logout' class='button'>LOGOUT</a>
                    </div>
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="userInfo">
                    <div class="avatar" style="background-image: url(<?php echo e($user->propic == null ? 'assets/default_avatar.png' : $user->propic); ?>)">
                    </div>
                    <h1><?php echo e($user->name); ?></h1>
                </div>               
            </nav>
        </header>

        <section class="container">

            <div id="results">
            <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="track unselected">
                <div class="trackInfo">
                    <img src="<?php echo e($song->content->image); ?>">
                    <div class="infoContainer">
                        <div class="info">
                            <strong><?php echo e($song->content->title); ?></strong>
                            <a><?php echo e($song->content->artist); ?></a>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </section>

    </body>
</html>
<?php /**PATH /Users/mpennisi/Desktop/esercitazione hw2/hw2/resources/views/profile.blade.php ENDPATH**/ ?>