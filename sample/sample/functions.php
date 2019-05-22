<?php

function sofmap_search($keyword){
	require(dirname(__FILE__)."/lib/goutte/vendor/autoload.php");
	$client = new \Goutte\Client();
	$crawler = $client->request('GET','https://www.sofmap.com/');
	$form = $crawler->filter("#frmSearch")->form();
	$form['keyword']->setValue($keyword);
	$crawler = $client->submit($form);
	echo $crawler->filter("")->text();
	$crawler->filter("#contents_main .list-maker")->parents()->parents()->parents()->each(function($node){
	    echo $node->html();
	});
}
