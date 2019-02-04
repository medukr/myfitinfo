<!-- Loading Modal Begin-->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
</div>
<!-- Loading Modal END-->
<!-- Error Modal Begin-->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card alert-danger p-3">
                <div class="text-center">
                    <i class="fa fa-times mx-2"></i>
                    <strong id="errorTextModal">Упс...Ошибочка!</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Error Modal END-->
<!-- Success Modal Begin-->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card alert-success p-3">
                <div class="text-center">
                    <i class="fa fa-check mx-2"></i>
                    <strong id="successTextModal">Успешно!</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal END-->

<!-- Loading Modal Style Begin-->
<style>
    .cssload-container {
        width: 100%;
        height: 49px;
        text-align: center;
    }

    .cssload-speeding-wheel {
        width: 49px;
        height: 49px;
        margin: 0 auto;
        border: 3px solid rgb(0,0,0);
        border-radius: 50%;
        border-left-color: transparent;
        border-right-color: transparent;
        animation: cssload-spin 575ms infinite linear;
    }

    @keyframes cssload-spin {
        100%{ transform: rotate(360deg); transform: rotate(360deg); }
    }
</style>
<!-- Loading Modal Style END-->
