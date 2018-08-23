<?php
/**
 * This class will be present an colorpicker control
 */
if (class_exists('WP_Customize_Control')) {

	class themesflat_Typography extends WP_Customize_Control {
		/**
		 * The control type
		 * 
		 * @var  string
		 */
		public $type = 'typography';
		public $fields = array(
			'family', 'size', 'style', 'subsets','color','line_height'
		);
		private $fonts = false;
		private $titles, $titles_subsets;
		private static $localize_enqueued = false;

		/**
		 * Enqueue assets for this control
		 * 
		 * @return  void
		 */
		
		/**
		 * Render the control markup
		 * 
		 * @return  void
		 */
		public function render() {
			$id    = 'themesflat-options-control-' . $this->id;
			$class = 'themesflat-options-control themesflat-options-control-' . $this->type;

			if ( $this->value() )
				$this->class = 'active';

			if ( ! empty( $this->class ) )
				$class .= " {$this->class}";

			if ( empty( $this->label ) )
				$class .= ' no-label';

			?><li id="<?php themesflat_esc_attr( $id ); ?>" class="<?php themesflat_esc_attr( $class ) ?>">
				<?php $this->render_content(); ?>
			</li><?php
		}

		public function render_content() {
			$this->titles = array(
				'100'        => esc_html__( 'Thin 100', 'redbiz' ),
				'100italic'  => esc_html__( 'Thin 100 italic', 'redbiz' ),
				'200'        => esc_html__( 'Extra-light 200', 'redbiz' ),
				'200italic'  => esc_html__( 'Extra-light 200 italic', 'redbiz' ),
				'300'        => esc_html__( 'Light 300', 'redbiz' ),
				'300italic'  => esc_html__( 'Light 300 italic', 'redbiz' ),
				'400'        => esc_html__( 'Normal 400', 'redbiz' ),
				'400italic'  => esc_html__( 'Normal 400 italic', 'redbiz' ),
				'regular'    => esc_html__( 'Normal 400', 'redbiz' ),
				'italic'     => esc_html__( 'Normal 400 italic', 'redbiz' ),
				'500'        => esc_html__( 'Medium 500', 'redbiz' ),
				'500italic'  => esc_html__( 'Medium 500 italic', 'redbiz' ),
				'600'        => esc_html__( 'Semi-bold 600', 'redbiz' ),
				'600italic'  => esc_html__( 'Semi-bold 600 italic', 'redbiz' ),
				'700'        => esc_html__( 'Bold 700', 'redbiz' ),
				'700italic'  => esc_html__( 'Bold 700 italic', 'redbiz' ),
				'800'        => esc_html__( 'Extra-bold 800', 'redbiz' ),
				'800italic'  => esc_html__( 'Extra-bold 800 italic', 'redbiz' ),
				'900'        => esc_html__( 'Ultra-bold 900', 'redbiz' ),
				'900itallic' => esc_html__( 'Ultra-bold 900 italic', 'redbiz' )
			);

			$this->titles_subsets = array(
				"cyrillic-ext"  => esc_html__("Cyrillic Extended",'redbiz'),
			    "greek" 		=> esc_html__("Greek",'redbiz'),
			    "greek-ext"		=>	esc_html__("Greek Extended",'redbiz'),
			    "latin-ext"		=>	esc_html__("Latin Extended",'redbiz'),
			    "cyrillic"		=>	esc_html__("Cyrillic",'redbiz'),
			    "vietnamese"	=>	esc_html__("Vietnamese",'redbiz'),
			    "latin" 		=> esc_html__("Latin",'redbiz')
				);

			$name = '_themesflat-options-control-typography-' . $this->id;
			$values = $this->value();
			$fonts = $this->get_fonts();
			if ( ! is_array( $values ) ) {
				$decoded_value = json_decode(str_replace('&quot;', '"', $values), true );
				$values = is_array( $decoded_value ) ? $decoded_value : array();
			}

			?>

				<div class="themesflat-options-control-inputs">
					<?php if ( in_array( 'family', $this->fields ) ): ?>
					<div class="themesflat-options-control-chosen typography-font">
						<div class="themesflat-options-control-title">
							<label for="<?php themesflat_esc_attr( $name ) ?>-family"><?php esc_html_e( 'Font Family', 'redbiz' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
							<select name="<?php themesflat_esc_attr( $name ) ?>[family]" id="<?php themesflat_esc_attr( $name ) ?>-family" class="select-choosen" >
								<optgroup label="<?php themesflat_esc_attr( 'Google Fonts', 'redbiz' ) ?>">
									<?php foreach ($fonts as $id => $font ): ?>
									<?php if( strcmp($font->family,$values['family']) == 0 )
										$index = $id;
									?>

									<option value="<?php themesflat_esc_attr( $font->family ) ?>" data_variants='<?php echo json_encode($font->variants);?>' data_subsets='<?php echo json_encode($font->subsets);?>' <?php selected($font->family, $values['family']) ?> ><?php themesflat_esc_html( $font->family ) ?></option>
									<?php endforeach ?>
								</optgroup>
							</select>
						</div>
					</div>
					<!-- /family -->
					<?php endif;?>

					<?php if ( in_array( 'size', $this->fields ) ): ?>
					<div class="typography-size">
						<div class="themesflat-options-control-title">
							<label for="<?php themesflat_esc_attr( $name ) ?>-size"><?php esc_html_e( 'Font Size (px)', 'redbiz' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
							<input type="text" name="<?php themesflat_esc_attr( $name ) ?>[size]" value="<?php themesflat_esc_attr( $values['size'] ) ?>" id="<?php themesflat_esc_attr( $name ) ?>-size" />
						</div>
					</div>
					<!-- /size -->
					<?php endif ?>

					<?php if ( in_array( 'line_height', $this->fields ) ): ?>
					<div class="typography-line_height">
						<div class="themesflat-options-control-title">
							<label for="<?php themesflat_esc_attr( $name ) ?>-line_height"><?php esc_html_e( 'Line_height (px)', 'redbiz' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
							<input type="text" name="<?php themesflat_esc_attr( $name ) ?>[line_height]" value="<?php themesflat_esc_attr( $values['line_height'] ) ?>" id="<?php themesflat_esc_attr( $name ) ?>-line_height" />
						</div>
					</div>
					<!-- /size -->
					<?php endif ?>

					<div class="themesflat-options-control-chosen typography-style">
						<div class="themesflat-options-control-title">
							<label><?php esc_html_e( 'Font Weight & Style', 'redbiz' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
							<label>
								<select name="<?php themesflat_esc_attr($name);?>[style]" id="<?php themesflat_esc_attr( $name ) ?>-style" class="selectpicker" data-live-search="true">
								    <?php foreach ($fonts[$index]->variants as $id => $font_weight):
								    ?>
									<option value="<?php themesflat_esc_attr( $font_weight ) ?>" <?php selected( $font_weight, $values['style'] ) ?> >
										<?php
											if ( isset( $this->titles[$font_weight] ) )
												themesflat_esc_html( $this->titles[$font_weight] );
											else
												themesflat_esc_html( $font_weight );
										?>
									</option>
									<?php endforeach ?>
								</select>
							</label>
						</div>
					</div>
					<!-- /font-weight -->

				<?php if ( in_array( 'subsets', $this->fields ) ): ?>
					<div class="themesflat-options-control typography-subsets themesflat-options-control-switcher active">
						<div class="themesflat-options-control-title">
							<label><?php esc_html_e( 'Font subsets', 'redbiz' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
						    <?php foreach ($fonts[$index]->subsets as $id => $subset):?>

								<label class="_options-switcher-subsets">
									<span class="themesflat-options-control-title"><?php
												if ( isset( $this->titles_subsets[$subset] ) )
													themesflat_esc_html( $this->titles_subsets[$subset] );
												else
													themesflat_esc_html( $subset );
											?></span>
									<input type="checkbox" <?php if(isset($values['subsets'])){checked(in_array($subset,$values['subsets']));}?> value="<?php themesflat_esc_attr($subset);?>" name="<?php themesflat_esc_attr($name);?>[subsets]">
									<span class="themesflat-options-control-indicator">
										<span></span>
									</span>
								</label>
							<?php endforeach;?>
						</div>
					</div>
				<?php endif;?>
					<!-- /font-subsets -->

				<?php if ( in_array( 'color', $this->fields ) ): ?>
				<div class="themesflat-options-control-color-picker typography-color">
					<div class="themesflat-options-control-title">
						<label><?php esc_html_e( 'Font Color', 'redbiz' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<div class="themesflat-options-control-color-picker">
							<div class="themesflat-options-control-inputs">
							<input type="hidden" class="choose-color"></input>
								<input type="text" class='themesflat-color-picker wp-color-picker' id="<?php themesflat_esc_attr( $name ) ?>-color" data-default-color="<?php themesflat_esc_attr( $values['default_color'] ) ;?>" value="<?php themesflat_esc_attr( $values['color'] ) ;?>" name="<?php themesflat_esc_attr($name);?>[color]" />
								
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<input type="hidden" id="typography-value"  name="<?php themesflat_esc_attr($name);?>" <?php $this->link();?>  value="<?php themesflat_esc_attr (  $values ) ;?>" />
				<input type="hidden" id="datas" data_subsets='<?php echo json_encode($this->titles_subsets);?>' data_variants = '<?php echo json_encode($this->titles);?>'/>
			</div>
		
		<?php
	}
		public function get_contents($fontFile) {
			ob_start();
			include  $fontFile;
			$file = ob_get_contents();
			ob_end_clean();
			return $file;
		}

	    public function get_fonts( $amount = 300 ) {
	        global $wp_filesystem;
	        $fontFile = get_option('googleFonts');
	        $fonttime = get_option('font_time');			        
	        //Total time the file will be cached in seconds, set to a week
	        $cachetime = 86400 * 7;
	        if(file_exists($fontFile) && $cachetime < filemtime($fontFile))
	        {
	            $content = json_decode($fontFile);
	        } else {
	            $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key='.themesflat_get_opt('key_google_api');
	            $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );			            
	            $content = json_decode($fontContent['body']);
	        }
	        if($amount == 'all')
	        {
	            return $content->items;
	        } else {
	            return array_slice($content->items, 0, $amount);
	        }
	    }
	}
}