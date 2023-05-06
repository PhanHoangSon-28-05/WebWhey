<style>
    legend{
        text-shadow: 2px 2px 4px #000000;
    }
    label{
        font-size:30px;
        color: black;
    }
     textarea{
        margin-top:10px;
    }
</style>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
        
            <form action="" method="POST">
            <fieldset>
                <legend class="text-center" style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">LOẠI SẢN PHẨM</legend>
                <!-- Name Type -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tên loại: </label>
                    </div>
                    <div class="col-6">
                        <input name="NameType"  type="text" class="form-control" id="" placeholder="Nhập loại sản phẩm">
                    </div>  
                </div>
                <!-- Status News -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Trang thái: </label>
                    </div>
                    <div class="col-6">
                    <input name="StatusType"  type="text" class="form-control" id="" placeholder="Còn cung cấp hoặc hết cung cấp">
                    </div>  
                </div>

                <p  class="text-center"><a href="?admin=loaisanpham"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></a></p>
                <?php
                    include('Handle/handle_type.php');
                ?> 
            </fieldset>

        </form>
       
        </div>
    </div>
</div>
