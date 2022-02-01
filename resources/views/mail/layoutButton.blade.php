<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
    <body style="background-color: #202020;font-family: &quot;Asap&quot;, sans-serif;width: 100%;height: 100%;margin: 0;line-height: 1.8em;padding-top: 25px;padding-bottom: 50px;">
    	<div class="wrapper" style="height: 100%;width: 100%;position: relative;text-align: center;">
	    	<div class="content" style="margin-right: auto;margin-left: auto;width: 600px;">
	    		<div class="box" style="text-align: left;margin-top: 100px;background-color: #fff;padding: 50px;margin-bottom: 24px;">
					<h4 style="font-size: 18px;margin-top: 40px;margin-bottom: 24px;color: #05B4CC; text-transform: uppercase;">{{ $title }}</h4>
					<p style="font-size: 14px;color: #333;margin-top: 0;margin-bottom: 40px;">
						{!! $text !!}
					</p>
					<a href="{{ $url }}" style="
					background-color: #05B4CC;
    color: #FFFFFF;
    border-radius: 0.2rem;
    text-transform: uppercase;
    letter-spacing: 0.06rem;
    font-weight: bold;
    font-size: 1rem;
    padding: 1rem 1.5rem;
					text-decoration: none;display: inline-block;text-align: center;line-height: 1;cursor: pointer;-webkit-appearance: none;-webkit-transition: background-color 0.25s ease-out, color 0.25s ease-out;transition: background-color 0.25s ease-out, color 0.25s ease-out;vertical-align: middle;border: 1px solid transparent;"">{{ $button }}</a>
	    		</div>
		    	<div class="footer">
			    	<a href="www.shiftappens.com" target="_blank" style="font-size: 14px;color: #fff;text-decoration: underline;">www.shiftappens.com</a>
		    	</div>
			</div>
    	</div>
	</body>
</html>