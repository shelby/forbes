﻿<?php 
	session_start();
	require_once(dirname(__FILE__).'/../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-会员俱乐部</title>
	<?php
		use_jquery();
		js_include_tag('select2css','public');
		css_include_tag('club_index','public');
		init_page_items();
	?>
</head>
<body>
	<div id=ibody>
		<? require_once(dirname(__FILE__).'/../inc/top.inc.php');?>
		<div id=bread><a href="#">会员俱乐部</a></div>
		<div id=bread_line></div>
		<div id=club_left>
			<div id=club_img <?php $pos_name='club_img'; show_page_pos($pos_name); ?>>
				<div id=club_l_t>
					<img src="<?php echo $pos_items->$pos_name->image1; ?>">
					<div id=fd>
					</div>
					<div id=fd_l ><?php echo $pos_items->$pos_name->description; ?></div>
					<div id=fd_r><a href="<?php echo $pos_items->$pos_name->href; ?>">了解详情>></a></div>
				</div>
			</div>
			<div class=survey_title_left></div>
			<div class=survey_title_center>
				<div class=wz>读者调查</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=survey_title_right></div>
			<div id="survey_content_left"></div>
			<div id="survey_content_center">
			<?php for($i=0;$i<2;$i++){ ?>
				<div class=content <?php $pos_name='club_survey_'.$i; show_page_pos($pos_name); ?>>
					<div class=content_l>
						<?php show_page_img($pos_items,$pos_name); ?>	
					</div>
					<div class=content_r>
						<div class=title><?php show_page_href($pos_items,$pos_name); ?></div>
						<div class=context><?php show_page_desc($pos_items,$pos_name); ?></div>
						<div class=dc><a href="<?php echo $pos_items->$pos_name->href; ?>">开始调查>></a></div>
					</div>
				</div>
			<?php } ?>
				
			</div>
			<div id="survey_content_right"></div>
			<div class=survey_title_left></div>
			<div class=survey_title_center>
				<div class=wz>礼品兑换</div>
				<div class=more><a href="">more>></a></div>
			</div>
			<div class=survey_title_right></div>
			<div id="gift_content_left"></div>
			<div id="gift_content_center">
				<?php for($i=0;$i<8;$i++){ ?>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/club/three.jpg"></a></div>
					<div class=pictitle><a href="">积分兑换</a></div>	
				</div>
				<?php } ?>
			</div>
			<div id="gift_content_right"></div>
			<div id="club_l_b"><a href=""><img border=0 src="/images/club/four.jpg"></a></div>
		</div>
		<div id=club_right>
			<div class=club_right_title_top></div>
			<div id=Bulletin>
				<div class=Bulletin_t>
					<div class=wz>会员公告</div>
				</div>
				<div id=Bulletin_c  <?php $pos_name='club_post'; show_page_pos($pos_name); ?>>
					<div id=pic><a href=""><img border=0 src="<></img"></a></div>
					<div id=pictitle><a href="">中国最富有的女富豪</a></div>
					<div id=piccontent><a href="">其加薪理由是在危机期间未接作家沃尔夫各央行应将通胀目标从2%提高至4%...</a></div>
				</div>
				<div class="club_dash"></div>
				<div id=Bulletin_b>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
					<div class=cl>
						<div class=cl_l></div>
						<div class=cl_r>
							<a href="">中国的出口优势不在汇势不在汇不在汇不在率中</a>	
						</div>	
					</div>
				</div>
			</div>
			<div class=club_right_content_bottom></div>
			<div id=zy>
				<div id=btn><button></button></div>	
			</div>
			<div class=club_right_title_top></div>
			<div id="idea">
				<div class=Bulletin_t>
					<div class=wz>获奖名单</div>
				</div>
				<div id="idea_t">
					<?php for($i=0;$i<3;$i++){ ?>
					<div class=content>
						<div class=pic>
							<a href=""><img border=0 src="/images/club/five.jpg"></a>	
						</div>
						<div class=pictitle>
							<a href="">后机时代更</a>	
						</div>
						<div class=piccontent>
							<a href="">其加薪理由是在危机期间未...</a>	
						</div>
					</div>
					<?php } ?>
				</div>
				<div class=club_right_title_top2></div>
				<div class=Bulletin_t>
					<div class=wz>读者高见</div>
				</div>
				<div class=Bulletin_c>
					<div class=idea_c>
						<div class=idea_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=idea_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="idea_dash"></div>
					<div class=idea_c>
						<div class=idea_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=idea_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="idea_dash"></div>
					<div class=idea_c>
						<div class=idea_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=idea_c_b><a href="">--XXXDDD</a></div>
					</div>
					<div class="idea_dash"></div>
					<div class=idea_c>
						<div class=idea_c_t><a href="">中信保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖保给宏盛的保险依赖于龙长生之妹龙长虹的INT和IRC两家公司（即美国的经销商）在美国口提供担保... ...</a></div>
						<div class=idea_c_b><a href="">--XXXDDD</a></div>
					</div>
				</div>
			</div>
			<div class=club_right_content_bottom></div>
			<div id=customize_title>
				<div id=wz>评论定制</div>
				<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
			</div>
			<div id=customize_left></div>
			<div id=customize_center>
				<div id=content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻　<input type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button>定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=content_b_l>
							<span style="font-size:14px; color:#11579e; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input type="radio">富豪　<input type="radio">创业　<input type="radio">商业</div>
							<div class=cl><input type="radio">投资　<input type="radio">生活</div>
						</div>
						<div id=content_b_r>
							<button>定制</button>	
						</div>	
					</div>	
				</div>	
			</div>
		</div>
		<? require_once(dirname(__FILE__).'/../inc/bottom.inc.php');?>
	</div>
</body>
</html>