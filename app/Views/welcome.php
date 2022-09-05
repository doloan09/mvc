
<?php require_once __DIR__ . '/inc/header.php'; ?>

<?php foreach ($listUser as $user) : ?>
    <div>
        <p><?php echo $user['id'] ?>_<?php echo $user['name'] ?>_<?php echo $user['pass'] ?>_<?php echo $user['address'] ?>
            _ <a href="/users/edit/<?php echo $user['id']?>" >update</a>__<a href="/delete/<?php echo $user['id']?>" >delete</a>
        </p>
    </div>
<?php endforeach; ?>
<a href="/users/create">create user</a>
<br>
<a href="/logout">Logout</a>

<?php require_once __DIR__ . '/inc/footer.php'; ?>
