/**
 *
 *
 * @param {string} value
 * @return {string} 
 * @description Takes an string and returns another string replacing spaces with dashes and with all letters in lowercase.
 */
function makeId(value) {
    let id = value.replace(/\s+/g, '-').toLowerCase();
    return id;
}
/**
 *
 *
 * @param {Array.<object>} array
 * @param {string} property
 * @return {Array.<object>} 
 * @description Takes an array of objects and the name of the property which will be used to sort the the objects in the array.
 */
function sortObjectsArray(array, property) {
    array.sort((a, b) => a[property].localeCompare(b[property]));
    return array;
}
/** 
 * @type {Array.<Object.<string, string, string>>} 
 * @description An array of objects that have an id, name and content<html_string>.
 * 
*/
let psi_database = [

{
        name: 'Defer offscreen images',
        content: `
        <li class="defer-offscreen-images">
	            <p><span style="font-weight: bold;"><b>Defer offscreen images</b></span><br>LazyLoad offscreen and hidden images after all critical resources have finished loading. Check more in our article: <a href="https://docs.wp-rocket.me/category/32-lazyload">https://docs.wp-rocket.me/category/32-lazyload</a>.<br><br>
				</p>
        </li>`,
    },
    {
        name: 'Avoid an excessive DOM size',
        content: `
        <li class="avoid-an-excessive-dom-size ">
            <p><span style="font-weight: bold;"><b>Avoid an excessive DOM size</b></span><br>The HTML structure of your site should not have more than 1500 nodes. Check our article: <a href="https://docs.wp-rocket.me/article/1412-avoid-an-excessive-dom-size">https://docs.wp-rocket.me/article/1412-avoid-an-excessive-dom-size</a>.<br><br>
				</p>
        </li>
        `,
    },
		{
        name: 'Ensure text remains visible during webfont load',
        content: `
        <li class="ensure-text-remains-visible-during-webfont-load">
        <p><span style="font-weight: bold;"><b>Ensure text remains visible during webfont load</b></span><br>Make sure the texts are visible even if the font hasn't been loaded yet. Please refer to our article: <a href="https://docs.wp-rocket.me/article/1392-ensure-text-remains-visible-during-webfont-load">https://docs.wp-rocket.me/article/1392-ensure-text-remains-visible-during-webfont-load</<br><br>
           </p>
    </li>
        `,
    },
		{
        name: 'Serve images in next-gen formats',
        content: `
        <li class="serve-images-in-next-gen-formats">
            <p><span style="font-weight: bold;"><b>Serve images in next-gen formats</b></span><br>It is recommended to use next generation formats for your images. Please check: <a href="https://docs.wp-rocket.me/article/1394-serve-images-in-next-gen-formats">https://docs.wp-rocket.me/article/1394-serve-images-in-next-gen-formats/a><br><br>          
            </p>
        </li>`,
    },
		{
        name: 'Efficiently encode images',
        content: `
        <li class="efficiently-encode-images">
            <p><span style="font-weight: bold;"><b>Efficiently encode images</b></span><br>Some images need additional compression <a href="https://docs.wp-rocket.me/article/1395-efficiently-encode-images">https://docs.wp-rocket.me/article/1395-efficiently-encode-images</a><br><br>             
            </p>
        </li>`,
    },
		{
        name: 'Properly size images',
        content: `
        <li class="properly-size-images">
            <p><span style="font-weight: bold;"><b>Properly size images</b></span><br>Make sure your images are using the right size. See our article: <a href="https://docs.wp-rocket.me/article/1396-properly-size-images">https://docs.wp-rocket.me/article/1396-properly-size-images</a><br><br>
            </p>
        </li>`,
    },
		
		{
        name: 'Remove Unused CSS',
        content: `
        <li class="remove-unused-css">
            <p><span style="font-weight: bold;"><b>Remove Unused CSS</b></span><br>Try to eliminate the CSS rules your pages are not using. See our article: <a href="https://docs.wp-rocket.me/article/1393-remove-unused-css">https://docs.wp-rocket.me/article/1393-remove-unused-css</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Avoid enormous network payloads',
        content: `
        <li class="avoid-enormous-network-payloads">
            <p><span style="font-weight: bold;"><b>Avoid enormous network payloads</b></span><br>The higher the network payload is the longer it takes to download your page. See more in our article: <a href="https://docs.wp-rocket.me/article/1415-avoid-enormous-network-payloads">https://docs.wp-rocket.me/article/1415-avoid-enormous-network-payloads</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Eliminate Render Blocking Resources',
        content: `
        <li class="eliminate-render-blocking-resources">
            <p><span style="font-weight: bold;"><b>Eliminate Render Blocking Resources</b></span><br>Render blocking resources need to be removed so that the page is presented as soon as possible. Check our article: <a href="https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources">https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Reduce JavaScript execution time',
        content: `
        <li class="reduce-javascript-execution-time">
            <p><span style="font-weight: bold;"><b>Reduce JavaScript execution time</b></span><br>Your website's total JavaScript execution time should be under 3.5 seconds. See more in our article: <a href="https://docs.wp-rocket.me/article/1418-reduce-javascript-execution-time">https://docs.wp-rocket.me/article/1418-reduce-javascript-execution-time</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Minimize main thread work',
        content: `
        <li class="minimize-main-thread-work">
            <p><span style="font-weight: bold;"><b>Minimize main thread work</b></span><br>If the scripts and styles needed to display the web are too many and too big, the browser will be kept busy and the website will remain irresponsive. See more in our article: <a href="https://docs.wp-rocket.me/article/1419-minimize-main-thread-work">https://docs.wp-rocket.me/article/1419-minimize-main-thread-work</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Remove Unused JavaScript',
        content: `
        <li class="remove-unused-javascript">
            <p><span style="font-weight: bold;"><b>Remove Unused JavaScript</b></span><br>Try to eliminate the scripts your pages are not using. See our article: <a href="https://docs.wp-rocket.me/article/1417-remove-unused-javascript">https://docs.wp-rocket.me/article/1417-remove-unused-javascript</a><br><br>
            </p>
        </li>`,
    },
   {
        name: 'Serve static assets with an efficient cache policy',
        content: `
        <li class="serve-static-assets-with-an-efficient-cache-policy">
            <p><span style="font-weight: bold;"><b>Serve static assets with an efficient cache policy</b></span><br>Browser caching rules sohuld be kept optimized. See our article: <a href="https://docs.wp-rocket.me/article/1397-serve-static-assets-with-an-efficient-cache-policy">https://docs.wp-rocket.me/article/1397-serve-static-assets-with-an-efficient-cache-policy</a><br><br>
            </p>
        </li>`,
    },

		{
        name: 'Reduce the impact of third party code',
        content: `
        <li class="reduce-the-impact-of-third-party-code">
            <p><span style="font-weight: bold;"><b>Reduce the impact of third party code</b></span><br>External resources should be added carefully to avoid hight impact on your site's loading page. See our article: <a href="https://docs.wp-rocket.me/article/1413-reduce-the-impact-of-third-party-code">https://docs.wp-rocket.me/article/1413-reduce-the-impact-of-third-party-code</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Preload Key Requests',
        content: `
        <li class="preload-key-requests">
            <p><span style="font-weight: bold;"><b>Preload Key Requests</b></span><br>The browser can be instructed to get critical resources loaded sooner. See our article: <a href="https://docs.wp-rocket.me/article/1420-preload-key-requests">https://docs.wp-rocket.me/article/1420-preload-key-requests</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Reduce Initial Server Response Time',
        content: `
        <li class="reduce-initial-server-response-time">
            <p><span style="font-weight: bold;"><b>Reduce Initial Server Response Time</b></span><br>Server response time (also known as Time To First Byte) measures how long it takes the first byte of HTML to get from your server to your visitor’s browser. You can find more information here: <a href="https://docs.wp-rocket.me/article/1408-reduce-initial-server-response-time">https://docs.wp-rocket.me/article/1408-reduce-initial-server-response-time</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Preconnect to Required Origins',
        content: `
        <li class="preconnect-to-required-origins">
            <p><span style="font-weight: bold;"><b>Preconnect to Required Origins</b></span><br>Some additional rules are needed to let your browser know that your website is going to use resources from other domains later on. You can find more information here: <a href="https://docs.wp-rocket.me/article/1379-preconnect-to-required-origins">https://docs.wp-rocket.me/article/1379-preconnect-to-required-origins</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Enable Text Compression',
        content: `
        <li class="enable-text-compression">
            <p><span style="font-weight: bold;"><b>Enable Text Compression</b></span><br>Compression should be applied to your site's JavaScript and CSS assets. You can find more information here: <a href="https://docs.wp-rocket.me/article/1403-enable-text-compression">https://docs.wp-rocket.me/article/1403-enable-text-compression</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Minify CSS',
        content: `
        <li class="minify-css">
            <p><span style="font-weight: bold;"><b>Minify CSS</b></span><br>Your CSS files should be minified. You can find more information here: <a href="https://docs.wp-rocket.me/article/1380-minify-css-pagespeed">https://docs.wp-rocket.me/article/1380-minify-css-pagespeed</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Minify JavaScript',
        content: `
        <li class="minify-javascript">
            <p><span style="font-weight: bold;"><b>Minify JavaScript</b></span><br>The JavaScript files in your site should be minified. You can find more information here: <a href="https://docs.wp-rocket.me/article/1381-minify-javascript-pagespeed">https://docs.wp-rocket.me/article/1381-minify-javascript-pagespeed</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Does not use passive listeners to improve scrolling performance',
        content: `
        <li class="does-not-use-passive-listeners-to-improve-scrolling-performance">
            <p><span style="font-weight: bold;"><b>Does not use passive listeners to improve scrolling performance</b></span><br>The scrolling experience can be affected by touch and wheel event listeners and therefore, making the site feel as if it was non-responsive. Please check: <a href="https://docs.wp-rocket.me/article/1381-minify-javascript-pagespeed">https://docs.wp-rocket.me/article/1400-does-not-use-passive-listeners-to-improve-scrolling-performance</a><br><br>
            </p>
        </li>`,
    },   
		{
        name: 'Avoid Document write',
        content: `
        <li class="avoid-document-write">
            <p><span style="font-weight: bold;"><b>Avoid Document write</b></span><br>The browser stops rendinrg the pages when document.write() is being executed so we should avoid having scripts using it. Please check: <a href="https://docs.wp-rocket.me/article/1409-avoid-document-write">https://docs.wp-rocket.me/article/1409-avoid-document-write</a><br><br>
            </p>
        </li>`,
    }, 
		{
        name: 'Avoid chaining critical requests',
        content: `
        <li class="avoid-chaining-critical-requests">
            <p><span style="font-weight: bold;"><b>Avoid chaining critical requests</b></span><br>The greater the length of the chains the more significant the impact on page load performance. Please check: <a href="https://docs.wp-rocket.me/article/1414-avoid-chaining-critical-requests">https://docs.wp-rocket.me/article/1414-avoid-chaining-critical-requests</a><br><br>
            </p>
        </li>`,
    }, 
		{
        name: 'Keep request counts low and transfer sizes small',
        content: `
        <li class="keep-request-counts-low-and-transfer-sizes-small">
            <p><span style="font-weight: bold;"><b>Keep request counts low and transfer sizes small</b></span><br>This audit provides information on your sites number and size of requests so that you have in mind. Please see our related article: <a href="https://docs.wp-rocket.me/article/1416-keep-request-counts-low-and-transfer-sizes-small">https://docs.wp-rocket.me/article/1416-keep-request-counts-low-and-transfer-sizes-small</a><br><br>
            </p>
        </li>`,
    },   
		{
        name: 'Avoid Multiple Page Redirects',
        content: `
        <li class="avoid-multiple-page-redirects">
            <p><span style="font-weight: bold;"><b>Avoid Multiple Page Redirects</b></span><br>This one will be trigered if a page has two or more redirects. Please see our related article: <a href="https://docs.wp-rocket.me/article/1388-avoid-multiple-page-redirects">https://docs.wp-rocket.me/article/1388-avoid-multiple-page-redirects</a><br><br>
            </p>
        </li>`,
    },
		{
        name: 'Avoid serving legacy JavaScript to modern browsers',
        content: `
        <li class="avoid-serving-legacy-javascript-to-modern-browsers">
            <p><span style="font-weight: bold;"><b>Avoid serving legacy JavaScript to modern browsers</b></span><br>This means your site is using old JavaScript rules for browsers that don’t need them, and this should be avoided. Please see our related article: <a href="https://docs.wp-rocket.me/article/1386-avoid-serving-legacy-javascript-to-modern-browsers">https://docs.wp-rocket.me/article/1386-avoid-serving-legacy-javascript-to-modern-browsers</a><br><br>
            </p>
        </li>`,
    },
    // {
    //     id: makeId(''),
    //     name: '',
    //     content: ``,
    // }
];

psi_database = psi_database.map((element)=>{
    element.id = makeId(element.name);
    return element;
});
    psi_database = sortObjectsArray(psi_database, 'name');
// console.log(window.psi_database);
// console.log(psi_database);