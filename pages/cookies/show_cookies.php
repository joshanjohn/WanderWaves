<?php 

// SETTING COOKIES
setcookie("area", "D", time()+ 84000);
setcookie("minPrice", "200", time()+ 84000);
setcookie("maxPrice", "5000", time()+ 84000);
setcookie("numRooms", "1", time()+ 84000);
setcookie("checkIn", date("Y-m-d"), time()+ 84000);
setcookie("checkOut", date("Y-m-d"), time()+ 84000);


?>
<!-- MODAL TO SHOW COOKIES -->
<div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">COOKIES</h5>
            </div>
            <div class="modal-body">
                &#127850; Our website uses cookies &#x1F36A;
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>

            </div>
        </div>
    </div>
</div>