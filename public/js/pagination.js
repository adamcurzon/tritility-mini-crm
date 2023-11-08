// When a page number is in the get parameters of URL scroll to bottom of page to show new results
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
if (urlParams.get("pages")) {
    document
        .querySelector("main")
        .scrollTo(0, document.querySelector("main").scrollHeight);
}
