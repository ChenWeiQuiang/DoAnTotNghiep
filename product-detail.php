<?php
require('services/connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM `products` WHERE id = $id";
$result = mysqli_query($connect, $sql);
$product = mysqli_fetch_array($result);
$id_manufacturer = $product['id_manufacturer'];
$sql = "SELECT * FROM `products` WHERE id_manufacturer = $id_manufacturer LIMIT 3";

$related_products = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <?php include('user/components/head.php') ?>
</head>

<body>
  <!-- header start -->
  <?php include('user/components/header.php') ?>
  <!-- header end -->
  <div class="breadcrumb-area">
    <div class="container">
      <div class="breadcrumb-content text-center">
        <h2 class="text-dark">Chi tiết sản phẩm</h2>
      </div>
    </div>
  </div>
  <div class="product-details ptb-100 pb-90">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-7 col-12">
          <div class="product-details-img-content">
            <div class="product-details-tab mr-35 product-details-tab2">
              <div class="product-details-small nav mr-10 product-details-2" role="tablist">
                <a class="active mb-10" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                  <img src="user/assets/img/product-details/s5.jpg" alt="" />
                </a>
                <a class="mb-10" href="#pro-details2" data-toggle="tab" role="tab" aria-selected="true">
                  <img src="user/assets/img/product-details/s6.jpg" alt="" />
                </a>
                <a class="mb-10" href="#pro-details3" data-toggle="tab" role="tab" aria-selected="true">
                  <img src="user/assets/img/product-details/s7.jpg" alt="" />
                </a>
                <a class="mb-10" href="#pro-details4" data-toggle="tab" role="tab" aria-selected="true">
                  <img src="user/assets/img/product-details/s8.jpg" alt="" />
                </a>
              </div>
              <div class="product-details-large tab-content">
                <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                  <div class="easyzoom easyzoom--overlay is-ready">
                    <a href="user/assets/img/product-details/bl1.jpg">
                      <img src="public/images/<?php echo $product['image'] ?>" alt="" />
                    </a>
                  </div>
                </div>
                <div class="tab-pane fade" id="pro-details2" role="tabpanel">
                  <div class="easyzoom easyzoom--overlay is-ready">
                    <a href="user/assets/img/product-details/bl2.jpg">
                      <img src="public/images/<?php echo $product['image'] ?>" alt="" />
                    </a>
                  </div>
                </div>
                <div class="tab-pane fade" id="pro-details3" role="tabpanel">
                  <div class="easyzoom easyzoom--overlay is-ready">
                    <a href="user/assets/img/product-details/bl3.jpg">
                      <img src="public/images/<?php echo $product['image'] ?>" alt="" />
                    </a>
                  </div>
                </div>
                <div class="tab-pane fade" id="pro-details4" role="tabpanel">
                  <div class="easyzoom easyzoom--overlay is-ready">
                    <a href="user/assets/img/product-details/bl4.jpg">
                      <img src="public/images/<?php echo $product['image'] ?>" alt="" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-5 col-12">
          <div class="product-details-content">
            <h3><?php echo $product['name'] ?></h3>
            <div class="rating-number">
              <div class="quick-view-rating">
                <i class="pe-7s-star red-star"></i>
                <i class="pe-7s-star red-star"></i>
                <i class="pe-7s-star"></i>
                <i class="pe-7s-star"></i>
                <i class="pe-7s-star"></i>
              </div>
              <div class="quick-view-number">
                <span>2 Đánh giá</span>
              </div>
            </div>
            <div class="details-price">
              <span class="text-danger">Số lượng: <?php echo ($product['quantity']) ?></span>
            </div>
            <div class="details-price">
              <span><?php echo number_format($product['price'] - ($product['price'] * $product['discount'] / 100)) ?>VND</span>
            </div>
            <p>
              <?php echo ($product['description']) ?>
            </p>

            <div class="quickview-plus-minus">
              <div class="quickview-btn-cart">
                <a class="btn-add-to-cart btn-hover-black" href="#" data-id="<?php echo $product['id'] ?>">Thêm vào giỏ hàng</a>
              </div>
            </div>
            <div class="product-details-cati-tag mt-35">
              <ul>
                <li class="categories-title">Danh mục:</li>
                <li><a href="#">fashion</a></li>
                <li><a href="#">electronics</a></li>
                <li><a href="#">toys</a></li>
                <li><a href="#">food</a></li>
                <li><a href="#">jewellery</a></li>
              </ul>
            </div>
            <div class="product-details-cati-tag mtb-10">
              <ul>
                <li class="categories-title">Tags :</li>
                <li><a href="#">fashion</a></li>
                <li><a href="#">electronics</a></li>
                <li><a href="#">toys</a></li>
                <li><a href="#">food</a></li>
                <li><a href="#">jewellery</a></li>
              </ul>
            </div>
            <div class="product-share">
              <ul>
                <li class="categories-title">Chia sẻ :</li>
                <li>
                  <a href="#">
                    <i class="icofont icofont-social-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="icofont icofont-social-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="icofont icofont-social-pinterest"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="icofont icofont-social-flikr"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="product-description-review-area pb-90">
    <div class="container">
      <div class="product-description-review text-center">
        <div class="description-review-title nav" role="tablist">
          <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">Mô cả sản phẩm</a>
          <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false"> Đánh giá (0) </a>
        </div>
        <div class="description-review-text tab-content">
          <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
            <p>
              <?php echo $product['description'] ?>
            </p>
          </div>
          <div class="tab-pane fade" id="pro-review" role="tabpanel">
            <a href="#">Be the first to write your review!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- product area start -->
  <div class="product-area pb-95">
    <div class="container">
      <div class="section-title-3 text-center mb-50">
        <h2>Sản phẩm liên quan</h2>
      </div>
      <div class="product-style">
        <div class="related-product-active owl-carousel">
          <?php foreach ($related_products as $related_product) : ?>
            <div class="product-wrapper">
              <div class="product-img">
                <a href="product-detail.php?id=<?php echo $related_product['id'] ?>">
                  <img src="public/images/<?php echo $related_product['image'] ?>" alt="" />
                </a>
                <span>hot</span>
                <div class="product-action">
                  <a class="animate-left" title="Wishlist" href="#">
                    <i class="pe-7s-like"></i>
                  </a>
                  <a class="animate-top" title="Add To Cart" href="#">
                    <i class="pe-7s-cart"></i>
                  </a>
                  <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                    <i class="pe-7s-look"></i>
                  </a>
                </div>
              </div>
              <div class="product-content">
                <h4><a href="product-detail.php?id=<?php echo $related_product['id'] ?>"><?php echo $related_product['name'] ?></a></h4>
                <span><?php echo number_format($related_product['price'] - $related_product['price'] * $related_product['discount'] / 100)  ?>VND</span>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <!-- product area end -->
  <?php include('user/components/footer.php') ?>
  <!-- modal -->
  <?php include('user/components/modal_product.php') ?>
  <!-- modal -->
  <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-compare-width" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="#">
            <div class="table-content compare-style table-responsive">
              <table>
                <thead>
                  <tr>
                    <th></th>
                    <th>
                      <a href="#">Remove <span>x</span></a>
                      <img src="user/assets/img/cart/4.jpg" alt="" />
                      <p>Blush Sequin Top</p>
                      <span>$75.99</span>
                      <a class="compare-btn" href="#">Add to cart</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="compare-title">
                      <h4>Description</h4>
                    </td>
                    <td class="compare-dec compare-common">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>Sku</h4>
                    </td>
                    <td class="product-none compare-common">
                      <p>-</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>Availability</h4>
                    </td>
                    <td class="compare-stock compare-common">
                      <p>In stock</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>Weight</h4>
                    </td>
                    <td class="compare-none compare-common">
                      <p>-</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>Dimensions</h4>
                    </td>
                    <td class="compare-stock compare-common">
                      <p>N/A</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>brand</h4>
                    </td>
                    <td class="compare-brand compare-common">
                      <p>HasTech</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>color</h4>
                    </td>
                    <td class="compare-color compare-common">
                      <p>Grey, Light Yellow, Green, Blue, Purple, Black</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title">
                      <h4>size</h4>
                    </td>
                    <td class="compare-size compare-common">
                      <p>XS, S, M, L, XL, XXL</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="compare-title"></td>
                    <td class="compare-price compare-common">
                      <p>$75.99</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- all js here -->
  <?php include('user/components/link_footer.php') ?>
  <script>
    function convertNumberToCurrency(number) {
      const result = number.toLocaleString('it-IT', {
        style: 'currency',
        currency: 'VND'
      })
      return result;

    }
    $(document).ready(function() {
      // thêm sản phẩm vào giỏ hàng
      $(".btn-add-to-cart").click(function() {
        let id = $(this).data('id');
        $.ajax({
            url: 'add_to_cart.php',
            type: 'GET',
            data: {
              id
            },
          })
          .done(function(response) {
            if (response === 'add_to_cart_failed') {
              $.notify('Số lượng trong giỏ hàng đã đạt tối đa', 'error');
            } else if (response === 'product_out_of_stock') {
              $.notify('Số lượng sản phẩm đã hết !', 'error');
            } else {
              $.notify(response + " vào giỏ hàng", "success");
            }
          })
      })

      // show modal chi tiết sản phẩm
      $(".btn-view-detail").click(function() {

        let id = $(this).data('id');
        $.ajax({
            url: 'view_detail_modal.php',
            type: 'GET',
            data: {
              id
            },
          })
          .done(function(response) {
            const product = JSON.parse(response)
            console.log(product['name'])
            $(".title-modal").text(product['name']);
            $(".title-price-old").text(convertNumberToCurrency(product['price']));
            $(".title-price-new").text(convertNumberToCurrency(product['price'] - (product['price'] * product['discount'] / 100)));
            $(".title-desc").text(product['description']);
            $(".modal-image").attr("src", product['image']);
            $(".modal-link").attr("href", `product-detail.php?id=${product['id']}`)
          })
      })
    })
  </script>
</body>

</html>