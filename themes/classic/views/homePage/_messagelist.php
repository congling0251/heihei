<blockquote>
	<p style="width: 200px;WORD-BREAK: break-all; WORD-WRAP: break-word">
		<strong>
			<?php $this->beginWidget('CHtmlPurifier'); ?>
				<?php echo strlen($data->message)>30?substr($data->message,0,10).'<b style="color:grey;"> ...</b> '.substr($data->message,strlen($data->message)-10,10):$data->message; ?>
			<?php $this->endWidget(); ?>
		</strong>
	</p>
	<small>
		<?php echo date('Y年n月j日 h时i分s秒',$data->message_date); ?>
	</small>
</blockquote>