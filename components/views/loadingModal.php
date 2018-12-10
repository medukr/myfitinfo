<!-- Loading Modal Begin-->
<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-sm" role="document">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
</div>

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

<!-- Loading Modal END-->