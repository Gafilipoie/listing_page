<!DOCTYPE html>
<html ng-app="myApp">
    <head lang="en">
        <meta charset=utf-8>
        <title>Listing Page</title>
        <link rel="stylesheet" type="text/css" href="resources/css/normalize.css">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mediaqueries.css">
        <link rel="stylesheet" type="text/css" media="all" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css">
    </head>

    <body ng-controller="ProductsCtrl" infinite-scroll="#">    
        <div class="l-container l-container--spacing l-container--position" >
            <div class="listing-section">
                <div class="listing__items" ng-repeat="item in products | filter: searched_item | limitTo: myLimit">
                    <img class="listing__items__img" src="{{item.imageUrl}}" alt="img">
                    <p class="listing__items__title">{{item.title}}</p>
                    <span class="listing__items__price">{{item.price}}$</span>
                    <button class="listing__items__btn" ng-click="addToCart(item)">Add to cart</button>
                </div>
      
                <div class="loader">
                    <img src="resources/img/example_loading.gif" ng-show="myLimit < products.items.length">
                </div>
            </div>

            <div class="aside-commands">
                <div class="filter-box">
                    <h2>filters</h2>
                    <div class="filter__first-section">
                        <label>Category:</label>
                        <select class="filter__first-section__select" ng-model="searched_item">
                            <option value="">-- No Filter --</option>
                            <option>Cars</option>
                            <option>Fruits</option>
                            <option>Toys</option>
                        </select>
                    </div>                  
                </div>
                
                <div class="cart-box">
                    <h2>Cart</h2>
                    <div class="cart__product" ng-repeat="product in myCart.myProducts">
                        <p class="cart__product__title">{{product.title}} <span>x{{product.count}}</span></p>

                        <div class="cart__product__price">{{product.price}}$ <small class="remove" ng-click="remove(product)">[X]</small></div>
                    </div>
                    <div class="cart__total">
                        <p>Total</p>
                        <div class="cart__total__price">{{ getTotal() }}$</div>
                    </div>
                    <button class="listing__items__btn" ng-disabled="myCart.myProducts.length==0" ng-click="buyProducts(myCart.myProducts)">Buy it!</button>
                </div>
            </div>
        </div>


        <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>  
        <script src="resources/js/controllers.js"></script>
    </body>
    
</html>