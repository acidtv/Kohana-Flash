
<?foreach($messages as $message){?>
<div class='flash'>
	<span class='time'><?=$message['time']?></span> <?=$message['text']?>
</div>
<?}?>
