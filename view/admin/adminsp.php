<?php 
    require 'header.php';
?>
<form action="admin.php?act=add_product" method="post" enctype="multipart/form-data">
    <input type="text" name="ma_loai">
    <input type="text" name="ten_hh">
    <input type="text" name="hinh">
    <input type="text" name="don_gia">
    <input type="text" name="mota">
    <input type="submit" name="Thêm" value="Thêm">
</form>
<table style="border-collapse: collapse" border='1' cellpadding="5">
    <tr>
        <td>Mã loại</td>
        <td>Tên danh mục</td>
        <td>Hình</td>
        <td>Đơn giá</td>
        <td>Mô tả</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php
        foreach($ds as $ds){
            $linksua="admin.php?act=form_update_cata&ma_loai=".$ds['ma_loai'];
            $linkxoa="admin.php?act=delete_cata&ma_loai=".$ds['ma_loai'];
            echo '<tr>
            <td>'.$ds['ma_loai'].'</td>
            <td>'.$ds['ten'].'</td>
            <td><a href="'.$linksua.'">Sửa</a></td>
            <td><a href="'.$linkxoa.'">Xóa</a></td>
        </tr>';
        }
    ?>
</table>