var AutoScroll = true;
var doStop = false;

$(function() {
	$.get('tail.php?reset');
    $.repeat(1000, function() {
        doTail();
    });
});

function doTail(){
    if(!doStop){
        $.get('tail.php?ajax', function(data) {
            $('#tailLog').append(data);
            if(AutoScroll && data.length){
                $(window).scrollTop($('#scrollLock').offset().top);
            };
        });
    };
}
//Buttons
$('#AutoScroll').click(function() {
    var $this = $(this);
    $this.toggleClass('doAutoScroll');
    if ($this.hasClass('doAutoScroll')) {
        $this.text('Enable AutoScroll');
        AutoScroll = false;
    } else {
        $this.text('Disable AutoScroll');
        AutoScroll = true;
    }
});

$('#disable').click(function() {
    var $this = $(this);
    $this.toggleClass('doDisable');
    if ($this.hasClass('doDisable')) {
        $this.text('Start');
        doStop = true;
        $.get('tail.php?reset');
    } else {
        $this.text('Stop');
        doStop = false;
    }
});

$('#Clear').click(function() {
    $('#tailLog').empty();
});