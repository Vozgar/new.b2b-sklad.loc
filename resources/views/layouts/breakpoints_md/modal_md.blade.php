
<!--header_user_manager_md-->
<div class="modal fade" id="header_user_manager_md" tabindex="-1" aria-labelledby="header_user_manager_mdLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="header_user_manager_mdLabel">{{__('Your manager')}}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <span style="font-size: 1.1em; color: Dodgerblue;">
                    <?php
                    $user = auth()->user();
                    ?>

                    <i class="bi bi-person-bounding-box"></i> {{$user->settings['manager_name']}}
                </span>
                <hr>
                <span style="font-size: 1.2em; color: Dodgerblue;">
                    <i class="bi bi-phone"></i> {{$user->settings['manager_phone']}}
                </span>
            </div>
      <div class="modal-footer">
        
        <button type="button" class="btn bg-blue white" data-bs-dismiss="modal">{{__('Close')}}</button>
      </div>
    </div>
  </div>
</div>

<!--header_user_support_md-->
<div class="modal fade" id="header_user_support_md" tabindex="-1" aria-labelledby="header_user_support_mdLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="header_user_support_mdLabel">{{__('Support')}}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
             <div class="modal-body">				
          <span style="font-size: 1.2em; color: Dodgerblue;">
						<i class="bi bi-phone"></i> +380123456789
					</span>
                <hr>
					<span style="font-size: 1.2em; color: #824aad;">
						Viber +380123456789
					</span>
                <hr>
					<span style="font-size: 1.2em; color: #3d8fc7;">
						<i class="bi bi-telegram"></i> +380123456789
					</span>
                <hr>
					<span style="font-size: 1.3em; color: Dodgerblue;">
						<i class="bi bi-at"></i> webmaster@site.com.ua
					</span>
            </div>
        <div class="modal-footer">
        
        <button type="button" class="btn bg-blue white" data-bs-dismiss="modal">{{__('Close')}}</button>
      </div>
    </div>
  </div>
</div>



<!--finish_cart_md-->
<div class="modal fade" id="finish_cart_md" tabindex="-1" aria-labelledby="finish_cart_mdLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="finish_cart_mdLabel">Ваш заказ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Самовывоз
        №00000001
      </div>      
      <div class="modal-body">
      Доставка
        Магазин №1 (Винницкая область, Бихів, Вишнева, вул., буд. № 1)
      </div>      
      <div class="modal-body">
      Новая почта
        №00000001
      </div>
      <div class="modal-footer">
          <a class="btn bg-blue white" href="order-lists">Посмотреть статус заказа </a>
          <button type="button" class="btn btn-primary">Главная</button>
      </div>
    </div>
  </div>
</div>
