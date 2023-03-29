<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-left">
                    <div class="quick-view-learg-img">
                        <div class="quick-view-tab-content tab-content">
                            <a class="modal-link" style="display: block;">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img class="modal-image" src="user/assets/img/quick-view/l1.jpg" alt="">
                                </div>
                            </a>
                            <div class="tab-pane fade" id="modal2" role="tabpanel">
                                <img src="user/assets/img/quick-view/l2.jpg" alt="">
                            </div>
                            <div class="tab-pane fade" id="modal3" role="tabpanel">
                                <img src="user/assets/img/quick-view/l3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <h3 class="title-modal">Handcrafted Supper Mug</h3>
                        <div class="price">
                            <span class="new title-price-new">$90.00</span>
                            <span class="old title-price-old">$120.00 </span>
                            <p style="font-weight:bold" class="modal-quantity text-danger"></p>
                        </div>
                        <div class="rating-number">
                            <div class="quick-view-rating">
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                                <i class="pe-7s-star"></i>
                            </div>
                            <div class="quick-view-number">
                                <span>2 đánh giá</span>
                            </div>
                        </div>
                        <p class="title-desc">Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                        <div class="quickview-plus-minus">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <a class="btn-add-to-cart animate-left" title="Add To Cart" data-id="<?php echo $r['id'] ?>">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                </a>
                            <?php } else { ?>
                                <a class="animate-left" title="Đăng nhập" href="login.php">
                                    <i class=" pe-7s-next"></i>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>