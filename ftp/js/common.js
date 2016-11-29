jQuery(document).ready(function($){

	//закрытие модалки
    $(".modal-close").bind("click", function(e){
    	e.preventDefault();
    	$(this).closest(".modal-container").fadeOut(500);
    	$("#modal").fadeOut(500);
    	$("body").css({"overflow":"auto"});
    });

    //открытие модалки
    $("[data-event='showModal']").bind("click", function(e){
    	e.preventDefault();
    	var scrollTop = $(window).scrollTop();
    	var modalId = $(this).attr("data-modal");

    	$("#modal").fadeIn(500);
    	$("#modal").css({"top": scrollTop});
    	$("body").css({"overflow":"hidden"});
    	$(".modal-container[data-modal-id='" + modalId + "']").fadeIn(500);

    });

    // --- ARTICLES MODAL ---
    //закрытие модалки 
    $(".articles-modal-close").bind("click", function(e){
        e.preventDefault();
        $(this).closest(".articles-modal-container").fadeOut(500);
        $("#articles-modal").fadeOut(500);
        $("body").css({"overflow":"auto"});
    });

    //открытие модалки
    $("[data-event='showArticleModal']").bind("click", function(e){
        e.preventDefault();
        var scrollTop = $(window).scrollTop();
        var modalId = $(this).attr("data-modal");

        $("#articles-modal").fadeIn(500);
        $("#articles-modal").css({"top": scrollTop});
        $("body").css({"overflow":"hidden"});
        $(".articles-modal-container[data-modal-id='" + modalId + "']").fadeIn(500);

    });
    // --- END OF ARTICLES MODAL ---

});
