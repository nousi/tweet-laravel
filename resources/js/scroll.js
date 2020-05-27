$(document).on(function() {
  $('.jscroll').jscroll({
    // 無限に追加する要素は、どこに入れる？
    contentSelector: '.cards', 
    // 次のページにいくためのリンクの場所は？ ＞aタグの指定
    nextSelector: '.more-link',
    // 読み込み中の表示はどうする？
    loadingHtml: '読み込み中'
  });
});