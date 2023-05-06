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
            <legend class="text-center" style="font-size:50px; margin-top:20px; margin-bottom:40px; color:black; font-style: bold;">NHÀ CUNG CẤP</legend>
            <!-- Name Supplier -->
            <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                <div class="col-auto">
                    <label>Tên nhà cung cấp: </label>
                </div>
                <div class="col-6">
                    <input name="NameSupplier"  type="text" class="form-control" id="" placeholder="Nhập tên nhà cung cấp">
                </div>  
            </div>
            <!-- Address Supplier -->
            <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                <div class="col-auto">
                    <label>Địa chỉ: </label>
                </div>
                <div class="col-6">
                    <input name="AddressSupplier"  type="text" class="form-control" id="" placeholder="Nhập địa chỉ nhà cung cấp">
                </div>  
            </div>
            <!-- Phone Number -->
            <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                <div class="col-auto">
                    <label>Số điện thoại: </label>
                </div>
                <div class="col-6">
                    <input name="PhoneNumber"  type="number" class="form-control" id="" placeholder="Nhập số điện thoại nhà cung cấp">
                </div>  
            </div>
            <!-- Email -->
            <div class="row g-3 align-items-center" style="margin-top:20px; margin-bottom:20px;">
                <div class="col-auto">
                    <label>Email: </label>
                </div>
                <div class="col-6">
                    <input name="Email"  type="text" class="form-control" id="" placeholder="Nhập Email nhà cung cấp">
                </div>  
            </div>

            <!-- Thêm -->
            <p class="text-center"><button type="submit" name="form_click" value="save" class="btn btn-outline-success mb-3 btn-lg">Thêm</button></p>            
            <?php
                include('Handle/handle_supplier.php');
            ?> 
        </fieldset>
        </form>
        
       
        </div>
    </div>
</div>
