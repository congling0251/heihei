<?php foreach($messages as $message): ?>
	<blockquote>
		<p style="width: 200px;WORD-BREAK: break-all; WORD-WRAP: break-word">
			<strong>
				<?php $this->beginWidget('CHtmlPurifier'); ?>
					<?php echo strlen($message->message)>30?substr($message->message,0,10).'<b style="color:grey;"> ...</b> '.substr($message->message,strlen($message->message)-10,10):$message->message; ?>
				<?php $this->endWidget(); ?>
			</strong>
		</p>
		<small>
			<?php echo date('Y年n月j日 H时i分s秒',$message->message_date); ?>
		</small>
	</blockquote>
<?php endforeach; ?>