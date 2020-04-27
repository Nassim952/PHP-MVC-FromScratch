<form 
method="<?= $data["config"]["method"] ?>"
action="<?= $data["config"]["action"] ?>"
class="<?= $data["config"]["class"] ?>"
id="<?= $data["config"]["id"] ?>"
submit="<?= $data["config"]["submit"] ?>"
>
</form>

<?php foreach ($data["fields"] as $name => $configField):?>

<?php if($configField["type"] == "captcha"): ?>
    <img src="../script/captcha.php"></img>
<?php endif;?>

<input
    type="<?= $configField["type"] ?>"
    name="<?= $name ?>"
    placeholder="<?= $configField["placeholder"]??"" ?>"
    id="<?= $configField["id"]??"" ?>"
    class="<?= $configField["class"]??"" ?>"
    <?= ($configField["required"])?"required='required'" : "" ?>
    >

<?php endforeach ;?>