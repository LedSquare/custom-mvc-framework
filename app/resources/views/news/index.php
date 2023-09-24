<h1>
    News page
</h1>
<hr>

<? foreach ($news as $value): ?>
    <h3> <? echo $value['title'] ?></h3>
    <p> <? echo $value['description'] ?></p>
    <hr>
<? endforeach ?>