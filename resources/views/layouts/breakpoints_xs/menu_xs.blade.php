
<nav id="menu">
	<ul>
		<li>
			<span>Каталог</span>
				<ul>
					<li>
						<span>Отопление</span>
							<ul>
								<li><a href="#">Радыаторы</a></li>
								<li><a href="#">Водонагреватели</a></li>
							</ul>   
					</li>  
					<li>
						<span>Насосная техника</span>
							<ul>
								<li><a href="#">Поверхностные насосы</a></li>
								<li><a href="#">Циркуляционные насосы</a></li>
							</ul>   
					</li>
                </ul>   
        </li>   
		<li><a href="#">Выгрузка XML</a></li>
		<li><a href="#">Выгрузка XLS</a></li>		
	</ul>
</nav>
<script>
            document.addEventListener(
                "DOMContentLoaded", () => {
                    const menu = new MmenuLight(
                        document.querySelector( "#menu" ),
                        "(max-width: 600px)"
                    );

                    const navigator = menu.navigation();
                    const drawer = menu.offcanvas();

                    document.querySelector( "a[href='#menu']" )
                        .addEventListener( "click", ( evnt ) => {
                            evnt.preventDefault();
                            drawer.open();
                        });
                }
            );
        </script>