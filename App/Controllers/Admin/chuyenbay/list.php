<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">

                <form action="?pages=delete_all_cate" method="post">
                    <button type="submit" class="btn btn-secondary" name="delete_all">Delete</button>
                    <a class="btn btn-primary" role="button" href="index.php?pages=form_add_chuyenbay">Add</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="category1" onclick="checkedAllCate();"></th>
                                <th scope="col">MaChuyenBay</th>
                                <th scope="col">MaSanBayXuatPhat</th>
                                <th scope="col">MaSanBayDen</th>
                                <th scope="col">NgayGioXuatPhat</th>
                                <th scope="col">NgayGioDen</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $stt = 0;
                            foreach ($list_chuyenbay as $item) {
                                extract($item);
                                $stt++; ?>
                                <tr>
                                    <td> <input type="checkbox" class="category" name="cate_id[]" value="<?= $cate_id ?>">
                                    </td>
                                    <td>
                                        <?= $MaChuyenBay ?>
                                    </td>
                                    <td>
                                        <?= $MaSanBayXuatPhat ?>
                                    </td>
                                    <td>
                                        <?= $MaSanBayDen ?>
                                    </td>
                                    <td>
                                        <?= $NgayGioXuatPhat ?>
                                    </td>
                                    <td>
                                        <?= $NgayGioDen ?>
                                    </td>
                                    
                                    
                                    <td>
                                        <a class="dropdown-item" href="?pages=edit_chuyenbay&MaChuyenBay=<?= $MaChuyenBay ?>">Edit</a>
                                        <a class="dropdown-item"
                                            href="?pages=delete_cate&cate_id=<?= $MaChuyenBay ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>