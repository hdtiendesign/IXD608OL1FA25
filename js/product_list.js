$("#product-search").on("submit", function(e) {
    e.preventDefault();
});

const showResults = d => {
    $(".productlist").html(productListTemplate(d.result));
};

query({ type: "products_all" }).then(showResults);

// SEARCH
$("#product-search input").on("input", function () {
    let search = $(this).val().trim();

    // If empty, show all products again
    if (search === "") {
        query({ type: "products_all" }).then(showResults);
        return;
    }

    query({
        type: "product_search",
        search: search
    }).then(showResults);
});

// FILTER BUTTONS
$("[data-filter]").on("click", function () {
    let column = $(this).data("filter");
    let value = $(this).data("value");

    if (value === "") {
        // Empty = reset back to all products
        query({ type: "products_all" }).then(showResults);
        return;
    }

    query({
        type: "product_filter",
        column: column,
        value: value
    }).then(showResults);
});

// SORT DROPDOWN
$(".js-sort").on("change", function () {
    let v = $(this).val();

    let column = "date_create";
    let dir = "DESC";

    if (v == 2) dir = "ASC";
    if (v == 3) { column = "price"; dir = "ASC"; }
    if (v == 4) { column = "price"; dir = "DESC"; }

    query({
        type: "product_sort",
        column: column,
        dir: dir
    }).then(showResults);
});
