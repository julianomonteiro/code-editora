<h3><?php echo e(config('app.name')); ?></h3>
<p>Sua conta na plataforma foi criada</p>
<p>Usuário: <strong><?php echo e($user->email); ?></strong></p>
<p>
    <?php $link = route('codeeduuser.email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email); ?>
    Clique aqui para verificar sua conta<a href="<?php echo e($link); ?>"><?php echo e($link); ?></a>
</p>
<p>Obs.: Não responda este e-mail, ele é gerado automaticamente</p>