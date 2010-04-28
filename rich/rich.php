﻿<?php 
	require_once('../frame.php');
	$db = get_db();
	$id = intval($_GET['id']);
	if(empty($id)){
		redirect('/error.html');
		die();
	}
	$investor = new table_class('fb_investor');
	$investor->find($id);
	$item = $db->query("select t1.*,t2.name from fb_invest_items t1 join fb_invest_industry t2 on t1.invest_industry_id=t2.id where t1.investor_id=$id");
	$item_count = $db->record_count;
	$job = $db->query("select * from fb_investor_job_history where investor_id=$id");
	$job_count = $db->record_count;
	$news = $db->query("select t1.title,t1.id,t1.created_at from fb_news t1 join fb_investor_news t2 on t1.id=t2.news_id where t2.investor_id=$id order by t1.created_at desc");
	$news_count = $db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('public','right_inc','rich');
	?>
</head>

<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<span>福布斯中文网 > <a>投资人</a></span>
		</div>
		<div id="hr_top"></div>
			<div id="info">
				<div id="info_top"><div id="people_info">人物信息</div></div>
					<div id="info_connect">
						<div id="info_a">
							<div id="info_a_left"><img src="<?php echo $investor->image;?>" style="width:236px; height:301px; margin-top:2px; margin-left:2px; margin-right:2px; margin-bottom:2px;"></div>
							<div id="info_a_right">
									<div id="info_c_name"><font style="color:#246BB0; font-size:14px; font-weight:bold;">姓名：<?php echo $investor->name;?></font></div>											
									<div id="info_c_company"><font style="font-size:13px; font-weight:bold;">所在公司：</font><font style="font-size:13px; "><?php echo $investor->company;?></font> </div>
									<div id="info_c_capacity"><font style="font-size:13px; font-weight:bold;">身份：</font><font style="font-size:13px; "><?php echo $investor->post;?></font></div>
									<div id="investment"><font style="font-size:13px; font-weight:bold;">投资方向：</font><font style="font-size:13px;"><?php echo $investor->invest_zone;?></font></div>
									<div id="info_c_extra"><font style="font-size:13px; font-weight:bold;">个人介绍：</font></div>
									<div id="extra_content"><?php echo $investor->description;?></div>
							</div>
						</div>
						<div id="investment_b">
							<div id="i_b_title">投资项目</div>
							<div id="b_z">
									<div id="company_name">公司名称</div>
									<div id="b_type">投资类别</div>
									<div id="trade">行业</div>
									<div id="capx">投资金额</div>
							</div>
							<?php for($i=0;$i<$item_count;$i++){?>
							<div class="b_c">
									<div class="i_c_name"><?php echo $item[$i]->invest_company;?></div>
									<div class="i_c_type"><?php echo $item[$i]->invest_type;?></div>
									<div class="i_c_trade"><?php echo $item[$i]->name;?></div>
									<div class="i_c_capx"><?php echo $item[$i]->invest_money;?></div>
							</div>
							<?php }?>
						</div>
						<div class="c_hr"></div>
						<div id="career_z">
							<div id="career">职业生涯</div>
							<div id="career_title">
									<div id="employer">所在企业</div>
									<div id="task">担任任务</div>
									<div id="time">起止时间</div>
							</div>
							<?php for($i=0;$i<$job_count;$i++){?>
							<div class="b_c">
									<div class="careet_connect">
											<div class="employer"><?php echo $job[$i]->company_name?></div>
											<div class="task"><?php echo $job[$i]->post?></div>
											<div class="time"><?php echo $job[$i]->duration?></div>
									</div>
							</div>
							<?php }?>
						</div>
						<div class="c_hr"></div>
						<div id="investment_c">
							<div id="inve_title">投资动态</div>
							<?php for($i=0;$i<$news_count;$i++){?>
							<div class="inve_content">
								<div class="inve_left"></div>
								<div class="inve_right"><a href="<?php echo static_news_url($news[$i]);?>"><?php echo $news[$i]->title;?></a></div>
							</div>
							<?php }?>
						</div>
					</div>
					<div id="info_bottom"></div>
					<div id="christcross">
							<div id="christcross_left"></div>
							<div id="christcross_middle">
									<div id="chr_christcross">
											<div id="chr_c_left">点击按字母排序：</div>
											<div id="chr_c_right"><a href="#">A</a> <a href="#">B</a> <a href="#">C</a> <a href="#">D</a> <a href="#">E</a> <a href="#">F</a> <a href="#">G</a> <a href="#">H</a> <a href="#">I</a> <a href="#">J</a> <a href="#">K</a> <a href="#">L</a> <a href="#">M</a> <a href="#">N</a> <a href="#">O</a> <a href="#">P</a> <a href="#">Q</a> <a href="#">R</a> <a href="#">S</a> <a href="#">T</a> <a href="#">U</a> <a href="#">V</a> <a href="#">W</a> <a href="#">X</a> <a href="#">Y</a> <a href="#">Z</a></div>	
									</div>
									<div id="chr_sousuo">
											按照投资行业索引：  <select name="select" style="width:240px; border:1px solid #B4B4BE;"></select>
									<input type="button" name="str"  style="width:114px; height:37px; border:0px solid red; margin-left:60px; background:url(../images/search/button.gif) no-repeat;">
									</div>							
							
							</div>
							<div id="christcross_right"></div>
					</div>
			</div>
			
		
		
		
		
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<div id="money"><input type="button" style="width:111px; height:26px; margin-top:50px; margin-left:180px;	 background:url(../../images/rich/btn_data.jpg) no-repeat; border:0px solid red;"></div>
		
		 			<div id="made">
		 			<div id="essay_top">
						<div id=essay_con>投资人动态</div>	
					</div>
				</div>
				<div id="right_people">
					<div id="people_top">
							<div id="people">人  物</div>
							<div id="people_type">投资人类别</div>
							<div id="people_enterprise">最近投资企业</div>
							<div id="people_money">涉及金额</div>
					</div>
					<div id="people_connect">
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
						<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							
								<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
							<div class="people_c">
									<div class="c_people">小雨晨</div>
									<div class="c_type">VC</div>
									<div class="people_enterprise">徐福记</div>
									<div class="c_money">1.35亿元</div>
							</div>
					</div>
				</div>
		 		<div id="essay_bottom"></div>
		 		<div id="made">
		 			<div id="essay_top">
						<div id=essay_con>福布斯精华文章定制</div>	
					</div>
					<div id="essay_div">
									<div id="essay_a">
												<div id="essay_title">订阅福布斯快闻</div>
												<div id="essay_redio"><input type="radio" name="radiobutton" value="radiobutton" /></div>
												<div id="essay_rc">我要定制</div>
												<div id="essay_btn"><input type="button" name="sousuo" style="width:60px; height:28px; border:0px solid red; background:url(../images/rich/btn_bg.jpg) no-repeat; " value="定制"></div>
									</div>
									<div id="essay_b">订阅分类文章</div>
									<div id="essay_c">
									<div id="essay_c_left">
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
											<div class="essay_rdo"><div class="essay_rd"><input type="radio" name="radiobutton" value="radiobutton" /></div>富豪</div>
									</div>
									<div id="essay_c_right"><input type="button" name="sousuo" style="width:60px; height:28px; border:0px solid red; background:url(../images/rich/btn_bg.jpg) no-repeat; " value="定制"></div>
									</div>
						 		</div>
						 		<div id="essay_bottom"></div>
		 		</div>
				
	</div>

		<?php include "../inc/bottom.inc.php";?>
		
</body>
<html>