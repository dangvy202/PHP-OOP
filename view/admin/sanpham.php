
<div class="container">
    <div class="col-12">
        <?php 
            if(isset($onePd)):
                extract($onePd);
        ?>
        <form method="post" action="admin.php?act=sanpham">
            
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <input class ="form-control" value="<?php echo $ten_hh ?>" type="text" id="ten_hh" placeholder="Nhap ten loai" name ="ten_hh"/>
                </div>
                <div class="form-group col-sm-3">
                    <input class ="form-control" value="<?php echo $hinh ?>" type="text" id="hinh" placeholder="Link ảnh" name ="hinh"/>
                </div>
                <div class="form-group col-sm-2">
                    <input class ="form-control" value="<?php echo $ma_loai ?>" type="text" id="ma_loai" placeholder="Ma loai" name ="ma_loai"/>
                </div>
                <div class="form-group col-sm-2">
                    <input class ="form-control" value="<?php echo $don_gia ?>" type="text" id="don_gia" placeholder="Giá" name ="don_gia"/>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="4" name = "mota" id = "mota" placeholder="Mô tả"><?php echo $mota ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $ma_hh ?>" name="ma_hh"/>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sửa" name="EditPd"/>
            </div>
        </form>
        <?php else:?>
        <form method="post" action="../controller/admin.php?act=sanpham">
            
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <input class ="form-control" type="text" id="ten_hh" placeholder="Nhap ten loai" name ="ten_hh"/>
                </div>
                <div class="form-group col-sm-3">
                    <input class ="form-control" type="text" id="hinh" placeholder="Link ảnh" name ="hinh"/>
                </div>
                <div class="form-group col-sm-2">
                    <input class ="form-control" type="text" id="ma_loai" placeholder="Ma loai" name ="ma_loai"/>
                </div>
                <div class="form-group col-sm-2">
                    <input class ="form-control" type="text" id="don_gia" placeholder="Giá" name ="don_gia"/>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="4" name = "mota" id = "mota" placeholder="Mô tả"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Them" name="addPd"/>
            </div>
        </form>
            <?php endif; ?>
    </div>
</div>
<div class="container">
     <div class="col-12">
        <table class="table-bordered" width="100%" style="border-collapse: collapse" border='1' cellpadding="5">
            <tr>
                <th class ="text-center" scope="col">Ma hang hoa</th>
                <th class ="text-center" scope="col">Ten hang hoa</th>
                <th class ="text-center" scope="col">Don gia</th>
                <th class ="text-center" scope="col">Hinh</th>
                <th class ="text-center" scope="col">Ma loai</th>
                <th class ="text-center" scope="col">Mo ta</th>
                <th class ="text-center" scope="col" colspan="2" width = "10%">Edit</th>
            </tr>
            
            <?php
                foreach($ds as $ds):
                    extract($ds);
            ?>
            <tr>
                <td><?php echo $ma_hh ?></td>
                <td><?php echo $ten_hh ?></td>
                <td><?php echo $don_gia ?></td>
                <td><?php echo $hinh ?></td>
                <td><?php echo $ma_loai ?></td>
                <td><?php echo $mota ?></td>
                <td class="text-center"><a href="admin.php?act=sanpham&&update=1&&ma_hh=<?php echo $ma_hh ?>">Sửa</a></td>
                <td class="text-center"><a href="admin.php?act=sanpham&&delete=1&&ma_hh=<?php echo $ma_hh ?>">Xóa</a></td>
            </tr>
            <?php endforeach; ?>
            
        </table>
    </div>
</div>     