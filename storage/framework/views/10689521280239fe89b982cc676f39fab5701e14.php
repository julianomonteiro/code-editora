<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <?php
            $navbar = Navbar::withBrand(config('app.name'), url('/'))->inverse();
            if(Auth::check()){
                $links = Navigation::links([
                    [
                       'link' => route('categories.index'),
                       'title' => 'Categoria'
                    ],
                    [
                            'link' => route('books.index'),
                            'title' => 'Livros'
                    ]
                ]);
                $logout = Navigation::links([
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => url('/logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"logout-form\").submit();"
                                ]
                            ]
                        ]
                    ]
                ])->right();
                $navbar->withContent($links)->withContent($logout);
            }
        ?>
        <?php echo $navbar; ?>

        <?php echo Form::open(['url' =>url('/logout'), 'id' => 'logout-form', 'sytle' => 'display:none']); ?>

        <?php echo Form::close(); ?>


        <div class="panel panel-default center-block col-md-10 col-md-push-1">
            <div class="panel-body">
                <?php if(Session::has('message')): ?>
                    <?php echo Alert::success(Session::get('message')); ?>

                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
