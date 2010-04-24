﻿<?
	include_once(dirname(__FILE__).'/../frame.php');
	$db = get_db();
	$nav=$db->query('select id from fb_navigation where name="榜单"');
	$nav=$nav[0]->id;	
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/Tr/1999/rEC-html401-19991224/loose.dtd">
<head>
   <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-榜单首页</title>
	<?php
		use_jquery();
		js_include_tag('public','index','right');
		css_include_tag('list','public','right_inc');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
		<? require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="#">榜单</a></div>
		<div id=bread_line></div>
		<div id="list_left">
			<div id=lists_headline>
				<?php $record_show = get_news_by_pos('榜单头条','榜单首页');?>
				<div id=headline>
					<div class=headline_pic id=headline_pic_0><a href="<?php echo $pos_items->listindex_hl_0->href; ?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->listindex_hl_0->image1; ?>"></a></div>
					<div class=headline_pic id=headline_pic_1 style="display:none;"><a href="<?php echo $pos_items->listindex_hl_1->href; ?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->listindex_hl_1->image1; ?>"></a></div>
					<div class=headline_pic id=headline_pic_2 style="display:none;"><a href="<?php echo $pos_items->listindex_hl_2->href; ?>"><img border=0 width=300 height=200 src="<?php echo $pos_items->listindex_hl_2->image1; ?>"></a></div>
					<div id=headline_content>
						<div class=headline_title id=headline_title_0 <?php show_page_pos('listindex_hl_0')?>><a href="<?php echo $pos_items->listindex_hl_0->href;?>"><?php echo $pos_items->listindex_hl_0->display; ?></a></div>
						<div class=headline_title id=headline_title_1 style="display:none;" <?php show_page_pos('listindex_hl_1')?>><a href="<?php echo $pos_items->listindex_hl_1->href;?>"><?php echo $pos_items->listindex_hl_1->display; ?></a></div>
						<div class=headline_title id=headline_title_2 style="display:none;" <?php show_page_pos('listindex_hl_2')?>><a href="<?php echo $pos_items->listindex_hl_2->href;?>"><?php echo $pos_items->listindex_hl_2->display; ?></a></div>
						<div class=headline_description id=headline_description_0><?php echo $pos_items->listindex_hl_0->description; ?></div>
						<div class=headline_description id=headline_description_1 style="display:none;"><?php echo $pos_items->listindex_hl_1->description; ?></div>
						<div class=headline_description id=headline_description_2 style="display:none;"><?php echo $pos_items->listindex_hl_2->description; ?></div>
						
					<?php for($j=0;$j<=2;$j++){?>	
						<div class="headline_related" id="headline_related_<?php echo $j?>" <?php if($j<>0){echo "style='display:none'";}?> >
						<?php				
							//if($record_show[$j]->id!=''){
							//	$rela_list = $db->query("select t1.* from fb_custom_list_type t1 join fb_list_relation t2 on t1.id=t2.rela_id where t2.list_id={$record_show[$j]->id} order by t2.priority limit 3");
								for($i=0;$i<2;$i++)
								{
							//		  if(count($rela_list)<1){break;}
								$pos_name = "listindex_hl_{$j}_{$i}";
								?>
									<div class=list <?php show_page_pos($pos_name)?>><a href="<?php echo $pos_items->$pos_name->href;?>"><?php echo $pos_items->$pos_name->display;?></a></div>
							<?php 	}
							//}
						?>				
						</div>
					<? }?>	
		
						<div id=btn>
							<div class=headline_btn1 id=l style="background:url(/images/index/slideshow_back.gif) no-repeat;"></div>
							<div class=headline_btn2 id=0 style="background:url(/images/index/slideshow_active.gif) no-repeat"></div>
							<div class=headline_btn2 id=1 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
							<div class=headline_btn2 id=2 style="background:url(/images/index/slideshow_unactive.gif) no-repeat"></div>
							<div class=headline_btn1 id=r style="background:url(/images/index/slideshow_next.gif) no-repeat"></div>
						</div>
					</div>
				</div>
			</div>

			<div class=caption>
					<div class=captions>榜单推荐</div>
					<div class=line>|</div>
					<a href="" class=more></a>
			</div>
			<div id=recommend>

					<?php 
					for($i=0;$i<5;$i++){
						$pos_name = "listindex_recommend_{$i}";
					?>
					<div class="recommend_p" <?php show_page_pos($pos_name)?>>
						<div class=recommend_pic><img width="94" height="94" src="<?php echo $pos_items->$pos_name->image1;?>"></div>
						<div class="recommend_list"><a href="<?php echo $pos_items->$pos_name->href?>"><?php echo $pos_items->$pos_name->display;?></a></div>
					</div>
					<?php }?>
			</div>
			<div class="recommend_dash"></div>

			<div class=caption>
					<div class=captions>常规榜单</div>
					<div class=line>|</div>
					<a href="" class=more></a>
			</div>

			<div id="normal_list">
				<div class="list_list">
				<?php 							
					$type = array('rich' => '富豪','company' => '公司','famous' => '名人','tech' => '科技');
					foreach($type as $key => $val){
				?>
					<div class="list_box">
						<div class="list_title">
							<div class="title"><?php echo $val;?></div>
							<div class="title_line"></div>
						</div>
						<div class="list_li_box">
							<?php for($i=0;$i<4;$i++){
								$pos_name = "listindex_{$key}_{$i}"; 
							?>
								<li <?php show_page_pos($pos_name)?>><a href="<?php echo $pos_items->$pos_name->href?>" target=_blank><?php echo $pos_items->$pos_name->display;?></a></li>
							<?php } ?>
						</div>
					</div>
					<?php }?>
				</div>
				<div id=list_dash></div>
				<div class="list_list">
					<?php $type= array('invest' => '投资','city' => '城市','sport' => '体育','edu' => '教育')?>
					<?php 							
					foreach($type as $key => $val){
					?>
					<div class="list_box">
						<div class="list_title">
							<div class="title"><?php echo $val;?></div>
							<div class="title_line"></div>
						</div>
						<div class="list_li_box">
							<?php for($i=0;$i<4;$i++){
								$pos_name = "listindex_{$key}_{$i}"; 
							?>
								<li <?php show_page_pos($pos_name)?>><a href="<?php echo $pos_items->$pos_name->href?>" target=_blank><?php echo $pos_items->$pos_name->display;?></a></li>
							<?php } ?>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
	
		
		</div>
		<div id="right_inc" style="margin-top:10px;">
		  		<?php include dirname(__FILE__)."/../right/ad.php";?>
		  		<?php include dirname(__FILE__)."/../right/right_list.php"?>
		  		<?php include dirname(__FILE__)."/../right/article.php";?>
		 </div>
		
		<? require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>
</html>