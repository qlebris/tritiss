$(document).ready(function() {
    var navbarToggle = '.navbar-toggler'; // name of navbar toggle, BS3 = '.navbar-toggle', BS4 = '.navbar-toggler'
    $('.dropdown, .dropup').each(function() {
        var dropdown = $(this),
            dropdownToggle = $('[data-toggle="dropdown"]', dropdown),
            dropdownHoverAll = dropdownToggle.data('dropdown-hover-all') || false;

        // Mouseover
        dropdown.hover(function(){
            var notMobileMenu = $(navbarToggle).size() > 0 && $(navbarToggle).css('display') === 'none';
            if ((dropdownHoverAll == true || (dropdownHoverAll == false && notMobileMenu))) {
                dropdownToggle.trigger('click');
            }
        })
    });
});