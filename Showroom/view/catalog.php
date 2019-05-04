<?php

include_once './class/class_categories.php';
include_once './class/class_products.php';

$categories = new Categories;
$produsts = new Products;

?>
<section class="catalog">
  <div class="catalog_top_logo">
    <p>Catalog <span>view</span></p>
    <img src="img/catalog_top_logo.jpg" alt="">   
  </div>
  <div class="catalog_sidebar">
    <div class="left_sidebar">

                <!-- АККАРДЕОН  -->

        <div class="accordeon">
            <div class="acc-head">
                <p>Мужское<i class="fa fa-angle-down"></i></p>
            </div>
            <ul class="ac-body">
            <?php foreach ($categories->CategoriesChilds() as $key => $value) {?>
                <li><a href="catalog?cat=2&child_cat=<?php echo  $value['id']; ?>"><?php echo  $value['name']; ?></a></li>
            <?php } ?> 
            </ul>
            <div class="acc-head">
                <p>Женское<i class="fa fa-angle-down"></i></p>
            </div>
            <ul class="ac-body">
            <?php foreach ($categories->CategoriesChilds() as $key => $value) {?>
                <li><a href="catalog?cat=3&child_cat=<?php echo  $value['id']; ?>"><?php echo  $value['name']; ?></a></li>
            <?php } ?> 
            </ul>
        </div>
			
			<!-- БРЕНД  -->
		
        <div class="brand">
			<p>Бренд:</p>
			<form action="#" method="post">
				<select name="Brand">
					<option value="all" selected>Выбрать</option>
					<option value="puma"><p>Puma</p></option>
					<option value="adidas"><p>Adidas</p></option>
					<option value="nike">Nike</option>
					<option value="reebok">Reebok</option>
				</select>
			</form>
        </div>

			<!-- ЦЕНА  -->

        <div class="left_sidebar_price">
			<p>Цена</p>
			<form action="#" method="POST">
				<p><input type="checkbox" name="Price[]" value="300-500">от 300 грн до 500 грн</p>
				<p><input type="checkbox" name="Price[]" value="501-1000">от 501 грн до 1000 грн</p>
				<p><input type="checkbox" name="Price[]" value="1001-1500">от 1001 грн до 1500 грн</p>
			</form>
        </div>
      
			<!-- РАЗМЕР  -->
	  
        <div class="left_sidebar_size">
			<p>Размер</p>
			<ol>
				<form action="#" method="POST">
                    <p><input type="checkbox" name="Size[]" value="xxs">xxs</p>
                    <p><input type="checkbox" name="Size[]" value="xs">xs</p>
                    <p><input type="checkbox" name="Size[]" value="s">s</p>
                    <p><input type="checkbox" name="Size[]" value="m">m</p>
                    <p><input type="checkbox" name="Size[]" value="l">l</p>
                    <p><input type="checkbox" name="Size[]" value="xl">xl</p>
                    <p><input type="checkbox" name="Size[]" value="xxl">xxl</p>
                    <p><input type="checkbox" name="Size[]" value="xxxl">xxxl</p>
                    <input type="submit" value="Применить фильтр" name="filter">
				</form>
			</ol>
		</div>
        
			<!-- ЦВЕТ  -->
		
		<div class="left_sidebar_color">
			<p>Цвет</p>
			<form action="" method="POST">
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="red" class="checkbox__input">  
					<span class="checkbox__label"></span>
				</label>
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="green" class="checkbox__input">  
					<span class="checkbox__label_green"></span>
				</label>
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="yellow" class="checkbox__input">  
					<span class="checkbox__label_yellow"></span>
				</label>
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="blue" class="checkbox__input">  
					<span class="checkbox__label_blue"></span>
				</label>
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="brown" class="checkbox__input">  
					<span class="checkbox__label_brown"></span>
				</label>
				<label class="checkbox-transform">
					<input type="checkbox" name="Color[]" value="violet" class="checkbox__input">  
					<span class="checkbox__label_violet"></span>
                </label>
                 
			</form>
        </div>
        <?php print_r($_POST); ?>
        <form action="#" method="post">
        
        </form>
        
   
    </div>
	
			<!-- ПРАВЫЙ САЙДБАР  -->
	
    <div class="right_sidebar">
        <div class="catalog_products">
            <div class="row">
            
            <?php if (!empty($_GET['child_cat'])) { // если категория выбрана выводим товары выбраной категории!
                
                $child_id = $_GET['child_cat'];
                $cat_id = $_GET['cat']; ?> 

                <?php foreach ($produsts->products_list_categories($cat_id, $child_id) as $key => $value) { ?> 
                    <div class="item">
                        <p class="price"><sup>£</sup><?php echo $value['price'] ?></p>
                        <a class="view" href="#"><i class="fa fa-info"></i></a>
                        <a href="#"><img src="img/<?php echo $value['foto'] ?>" alt="<?php echo $value['foto'] ?>"></a>
                        <div class="description">
                            <p class="name"><?php echo $value['name'] ?> <span><?php echo $value['price'] ?>£</span></p>
                            <p class="desc">Classic casual t-shirt for women on the move.</p>
                            <p class="comp">100% cotton.</p>
                            <div class="icon">
                                <form action="#" mathod="post">
                                    <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    <button type="submit"><i class="fa fa-heart-o"></i></button>
                                    <button type="submit"><i class="fa fa-compress"></i></button>
                                </form>
                            </div>
                        </div>    
                    </div> 
                <?php } ?> 
                <?php if (!$produsts->products_list_categories($cat_id, $child_id)) { // если товаров нет в данной категории

                    echo 'Товары не найдены';
                }
                ?> 

            <?php } else { // в противном случаи выводим все товары ?> 

                <?php foreach ($produsts->products_list() as $key => $value) {?> 
                    <div class="item">
                        <p class="price"><sup>£</sup><?php echo $value['price'] ?></p>
                        <a class="view" href="#"><i class="fa fa-info"></i></a>
                        <a href="#"><img src="img/<?php echo $value['foto'] ?>" alt="<?php echo $value['foto'] ?>"></a>
                        <div class="description">
                            <p class="name"><?php echo $value['name'] ?> <span><?php echo $value['price'] ?>£</span></p>
                            <p class="desc">Classic casual t-shirt for women on the move.</p>
                            <p class="comp">100% cotton.</p>
                            <div class="icon">
                                <form action="#" mathod="post">
                                    <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                    <button type="submit"><i class="fa fa-heart-o"></i></button>
                                    <button type="submit"><i class="fa fa-compress"></i></button>
                                </form>
                            </div>
                        </div>    
                    </div> 
                <?php } ?> 

            <?php } ?> 
             
                
            </div>    
        </div>
		
			<!-- ПАГИНАЦИЯ  -->
		
        <div class="pagination">
            <ul>
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
    </div>
</div> 
</section>