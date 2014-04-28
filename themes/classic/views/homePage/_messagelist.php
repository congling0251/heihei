<blockquote> <p style="width: 200px;WORD-BREAK: break-all; WORD-WRAP: break-word"><strong><?php echo strlen($data->message)>30?substr($data->message,0,10).'<b style="color:grey;"> ...</b> '.substr($data->message,strlen($data->message)-10,10):$data->message; ?></strong></p>
            <small><?php echo date('F j, Y \a\t h:i a',$data->message_date); ?></small>
        </blockquote>