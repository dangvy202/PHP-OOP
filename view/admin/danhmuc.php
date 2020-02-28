<?php 
    require 'header.php';
?>
<?php
    if(isset($get1) && is_array($get1)){
        $ten = $get1['ten'];
        $ma_loai =$get1['ma_loai'];
?>

<form action="admin.php?act=update_cata" method="post" enctype="multipart/form-data">
    <input type="text" name="ten" value="<?=$ten?>">
    <input type="hidden" name="ma_loai" value="<?=$ma_loai?>">
    <input type="submit" value="Cập nhật">
</form>

<?php } else{?>

<form action="admin.php?act=add_cata" method="post" enctype="multipart/form-data">
    <input type="text" name="ten">
    <input type="submit" name="Thêm" value="Thêm">
</form>

<?php }?>

<table style="border-collapse: collapse" border='1' cellpadding="5">
    <tr>
        <td>Mã</td>
        <td>Tên danh mục</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
        foreach($dm as $dm){
            $linksua="admin.php?act=form_update_cata&ma_loai=".$dm['ma_loai'];
            $linkxoa="admin.php?act=delete_cata&ma_loai=".$dm['ma_loai'];
            echo '<tr>
            <td>'.$dm['ma_loai'].'</td>
            <td>'.$dm['ten'].'</td>
            <td><a href="'.$linksua.'">Sửa</a></td>
            <td><a href="'.$linkxoa.'">Xóa</a></td>
        </tr>';
        }
    ?>
</table>