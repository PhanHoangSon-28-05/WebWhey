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
        
            <form action="" method="POST"enctype="multipart/form-data">
            <fieldset>
                <legend class="text-center" style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">LOẠI TIN TỨC</legend>
                <!-- Name News -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Tên loại tin: </label>
                    </div>
                    <div class="col-6">
                        <input name="NameNews"  type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                    </div>  
                </div>
                <!-- Image News -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Chọn file ảnh:</label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control-sm"  style="size:50px;" type="file" name="ImgNews" id="">
                    </div>  
                </div>
                <!-- Status News -->
                <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                    <div class="col-auto">
                        <label>Trang thái: </label>
                    </div>
                    <div class="col-auto">
                        <input name="StatusNews"  type="text" class="form-control" id="" placeholder="Tin củ hoặc tin mới">
                    </div>  
                </div>

                <p class="text-center"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></p>            
                <?php
                    include('Handle/handle_news.php');
                ?> 
            </fieldset>
        </form>
       
        </div>
    </div>
</div>
