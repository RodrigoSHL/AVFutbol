function format_date(european_date) {
    // For dates as "dd/mm/YYYY hh:ii:ss"
      
    // First trim the date
    trimed_date = european_date.replace(/^\s+/g, '').replace(/\s+$/g, '');
      
    // Then transform it to an integer
    if (trimed_date != '') {
        var frDatea = trimed_date.split(' ');       
        var frTimea = frDatea[1].split(':');
        var frDatea2 = frDatea[0].split('-');
          
        return (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1] + frTimea[2]) * 1;
    }else return 10000000000000;    // = l'an 1000 ...
}

jQuery.fn.dataTableExt.oSort['date-euro-asc'] = function(x, y) {
    x = format_date(x);
    y = format_date(y);
      
    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
};
   
jQuery.fn.dataTableExt.oSort['date-euro-desc'] = function(x, y) {
    x = format_date(x);
    y = format_date(y);
      
    return ((x < y) ? 1 : ((x > y) ? -1 : 0));
};