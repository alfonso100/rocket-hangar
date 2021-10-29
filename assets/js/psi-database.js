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
 * @type {Array.<Object>} 
 * @description An array of objects that have an id, name and content<html_string>.
 * 
*/
let psi_database = [

    {
        id: 'offscreen-images',
        name: 'Defer offscreen images',
        content: `
        <li class="offscreen-images">
	            <p><span style="font-weight: bold;"><b>Defer offscreen images</b></span><br>You should LazyLoad offscreen and hidden images: <a href="https://docs.wp-rocket.me/category/32-lazyload">https://docs.wp-rocket.me/category/32-lazyload</a>.<br><br>
				</p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'dom-size',
        name: 'Avoid an excessive DOM size',
        content: `
        <li class="dom-size">
            <a href="https://docs.wp-rocket.me/article/1412-avoid-an-excessive-dom-size">Avoid an excessive DOM size</a>
        </li>
        `,
        destination: 'out-of-scope',

    },
    {
        id: 'font-display',
        name: 'Ensure text remains visible during webfont load',
        content: `
        <li class="font-display">
        <p><span style="font-weight: bold;"><b>Ensure text remains visible during webfont load</b></span><br>The texts should be visible even if the font hasn't been loaded yet. Please read: <a href="https://docs.wp-rocket.me/article/1392-ensure-text-remains-visible-during-webfont-load">https://docs.wp-rocket.me/article/1392-ensure-text-remains-visible-during-webfont-load</<br><br>
           </p>
    </li>
        `,
        destination: 'can-advise',

    },
    {
        id: 'uses-webp-images',
        name: 'Serve images in next-gen formats',
        content: `
        <li class="uses-webp-images">
            <p><span style="font-weight: bold;"><b>Serve images in next-gen formats</b></span><br>It is recommended to use more compressed formats, like WebP, for your images. Please read: <a href="https://docs.wp-rocket.me/article/1394-serve-images-in-next-gen-formats">https://docs.wp-rocket.me/article/1394-serve-images-in-next-gen-formats</a><br><br>          
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-optimized-images',
        name: 'Efficiently encode images',
        content: `
        <li class="uses-optimized-images">
            <p><span style="font-weight: bold;"><b>Efficiently encode images</b></span><br>Some images need additional compression. Please read:<a href="https://docs.wp-rocket.me/article/1395-efficiently-encode-images">https://docs.wp-rocket.me/article/1395-efficiently-encode-images</a><br>[ADD IMAGES OR SCREENSHOT HERE]<br><br>            
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-responsive-images',
        name: 'Properly size images',
        content: `
        <li class="uses-responsive-images">
            <p><span style="font-weight: bold;"><b>Properly size images</b></span><br>Make sure your images are using the right size. Please read: <a href="https://docs.wp-rocket.me/article/1396-properly-size-images">https://docs.wp-rocket.me/article/1396-properly-size-images</a><br>[ADD IMAGES OR SCREENSHOT HERE]<br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },

    {
        id: 'unused-css-rules',
        name: 'Remove Unused CSS',
        content: `
        <li class="unused-css-rules">
            <p><span style="font-weight: bold;"><b>Remove Unused CSS</b></span><br>Try to eliminate the CSS rules your pages are not using. Please read: <a href="https://docs.wp-rocket.me/article/1393-remove-unused-css">https://docs.wp-rocket.me/article/1393-remove-unused-css</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'total-byte-weight',
        name: 'Avoid enormous network payloads',
        content: `
        <li class="total-byte-weight">
            <p><span style="font-weight: bold;"><b>Avoid enormous network payloads</b></span><br>You have to reduce the page size so your page downloads faster. Please read: <a href="https://docs.wp-rocket.me/article/1415-avoid-enormous-network-payloads">https://docs.wp-rocket.me/article/1415-avoid-enormous-network-payloads</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'render-blocking-resources',
        name: 'Eliminate render-blocking resources',
        content: `
        <li class="render-blocking-resources">
            <p><span style="font-weight: bold;"><b>Eliminate Render Blocking Resources</b></span><br>Render blocking resources need to be removed so that the page is presented as soon as possible. Please read: <a href="https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources">https://docs.wp-rocket.me/article/1407-eliminate-render-blocking-resources</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'bootup-time',
        name: 'Reduce JavaScript execution time',
        content: `
        <li class="bootup-time">
            <p><span style="font-weight: bold;"><b>Reduce JavaScript execution time</b></span><br>Your website's total JavaScript execution time should be under 3.5 seconds. Please read: <a href="https://docs.wp-rocket.me/article/1418-reduce-javascript-execution-time">https://docs.wp-rocket.me/article/1418-reduce-javascript-execution-time</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'mainthread-work-breakdown',
        name: 'Minimize main-thread work',
        content: `
        <li class="mainthread-work-breakdown">
            <p><span style="font-weight: bold;"><b>Minimize main thread work</b></span><br>If the scripts and styles needed to display the web are too many and too big, the browser will be kept busy and the website will remain unresponsive. Please read: <a href="https://docs.wp-rocket.me/article/1419-minimize-main-thread-work">https://docs.wp-rocket.me/article/1419-minimize-main-thread-work</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'unused-javascript',
        name: 'Remove unused JavaScript',
        content: `
        <li class="unused-javascript">
            <p><span style="font-weight: bold;"><b>Remove Unused JavaScript</b></span><br>Try to eliminate the scripts your pages are not using. Please read: <a href="https://docs.wp-rocket.me/article/1417-remove-unused-javascript">https://docs.wp-rocket.me/article/1417-remove-unused-javascript</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-long-cache-ttl',
        name: 'Serve static assets with an efficient cache policy',
        content: `
        <li class="uses-long-cache-ttl">
            <p><span style="font-weight: bold;"><b>Serve static assets with an efficient cache policy</b></span><br>Browser caching rules should be the correct ones. Please read: <a href="https://docs.wp-rocket.me/article/1397-serve-static-assets-with-an-efficient-cache-policy">https://docs.wp-rocket.me/article/1397-serve-static-assets-with-an-efficient-cache-policy</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },

    {
        id: 'third-party-summary',
        name: 'Reduce the impact of third-party code',
        content: `
        <li class="third-party-summary">
            <p><span style="font-weight: bold;"><b>Reduce the impact of third party code</b></span><br>External resources should be added carefully to avoid high impact on your site's loading page. Please read: <a href="https://docs.wp-rocket.me/article/1413-reduce-the-impact-of-third-party-code">https://docs.wp-rocket.me/article/1413-reduce-the-impact-of-third-party-code</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-rel-preload',
        name: 'Preload Key Requests',
        content: `
        <li class="uses-rel-preload">
            <p><span style="font-weight: bold;"><b>Preload Key Requests</b></span><br>The browser can be instructed to get critical resources loaded sooner. See our article: <a href="https://docs.wp-rocket.me/article/1420-preload-key-requests">https://docs.wp-rocket.me/article/1420-preload-key-requests</a><br>[RELATED TO FONTS -> ADD THE FONTS HERE / RELATED TO CSS -> IF OCD IS NOT ENABLED: REMOVE THIS -> IF OCD IS ENABLED: CHECK WHY]<br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'server-response-time',
        name: 'Reduce Initial Server Response Time',
        content: `
        <li class="server-response-time">
            <p><span style="font-weight: bold;"><b>Reduce Initial Server Response Time</b></span><br>Server response time (also known as Time To First Byte) measures how long it takes the first byte of HTML to get from your server to your visitor’s browser. Please read: <a href="https://docs.wp-rocket.me/article/1408-reduce-initial-server-response-time">https://docs.wp-rocket.me/article/1408-reduce-initial-server-response-time</a><br>[IF PAGE IS CACHED MOVE TO the OUT OF SCOPE]<br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-rel-preconnect',
        name: 'Preconnect to Required Origins',
        content: `
        <li class="uses-rel-preconnect">
            <p><span style="font-weight: bold;"><b>Preconnect to Required Origins</b></span><br>Some additional rules are needed to let your browser know that your website is going to use resources from other domains. Please read: <a href="https://docs.wp-rocket.me/article/1379-preconnect-to-required-origins">https://docs.wp-rocket.me/article/1379-preconnect-to-required-origins</a><br>You can add the following domains: <br>[ADD LIST OF PRECONNECT DOMAINS]<br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-text-compression',
        name: 'Enable text Compression',
        content: `
        <li class="uses-text-compression">
            <p><span style="font-weight: bold;"><b>Enable Text Compression</b></span><br>GZIP or Brotli compression should be applied to your site's HTML, JavaScript and CSS assets. WP Rocket does this by default, but [CHECK SERVER TYPE AND EXPLAIN WHY IS NOT WORKING]. Please read: <a href="https://docs.wp-rocket.me/article/1403-enable-text-compression">https://docs.wp-rocket.me/article/1403-enable-text-compression</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'unminified-css',
        name: 'Minify CSS',
        content: `
        <li class="unminified-css">
            <p><span style="font-weight: bold;"><b>Minify CSS</b></span><br>Your CSS files should be minified. Please read: <a href="https://docs.wp-rocket.me/article/1380-minify-css-pagespeed">https://docs.wp-rocket.me/article/1380-minify-css-pagespeed</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'unminified-javascript',
        name: 'Minify JavaScript',
        content: `
        <li class="unminified-javascript">
            <p><span style="font-weight: bold;"><b>Minify JavaScript</b></span><br>The JavaScript files in your site should be minified. Please read: <a href="https://docs.wp-rocket.me/article/1381-minify-javascript-pagespeed">https://docs.wp-rocket.me/article/1381-minify-javascript-pagespeed</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'uses-passive-event-listeners',
        name: 'Does not use passive listeners to improve scrolling performance',
        content: `
        <li class="uses-passive-event-listeners">
        <a href="https://docs.wp-rocket.me/article/1400-does-not-use-passive-listeners-to-improve-scrolling-performance">Does not use passive listeners to improve scrolling performance</a>       
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'no-document-write',
        name: 'Avoid Document write',
        content: `
        <li class="no-document-write">
            <a href="https://docs.wp-rocket.me/article/1409-avoid-document-write">Avoid Document write</a>
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'critical-request-chains',
        name: 'Avoid chaining critical requests',
        content: `
        <li class="critical-request-chains">
        <a href="https://docs.wp-rocket.me/article/1414-avoid-chaining-critical-requests">Avoid chaining critical requests</a>
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'resource-summary',
        name: 'Keep request counts low and transfer sizes small',
        content: `
        <li class="resource-summary">
            <p><span style="font-weight: bold;"><b>Keep request counts low and transfer sizes small</b></span><br>You should try to reduce the number and the size of requests. Please see: <a href="https://docs.wp-rocket.me/article/1416-keep-request-counts-low-and-transfer-sizes-small">https://docs.wp-rocket.me/article/1416-keep-request-counts-low-and-transfer-sizes-small</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'redirects',
        name: 'Avoid Multiple Page Redirects',
        content: `
        <li class="redirects">
            <p><span style="font-weight: bold;"><b>Avoid Multiple Page Redirects</b></span><br>This one will be triggered if a page has two or more redirects. Please see our related article: <a href="https://docs.wp-rocket.me/article/1388-avoid-multiple-page-redirects">https://docs.wp-rocket.me/article/1388-avoid-multiple-page-redirects</a><br>[CHECK IF IT HAPPENS WITH WPR BYPASSED]<br><br>
            </p>
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'legacy-javascript',
        name: 'Avoid serving legacy JavaScript to modern browsers',
        content: `
        <li class="legacy-javascript">
        <a href="https://docs.wp-rocket.me/article/1386-avoid-serving-legacy-javascript-to-modern-browsers">Avoid serving legacy JavaScript to modern browsers</a>
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'use-http-2',
        name: 'Use HTTP/2',
        content: `
        <li class="use-http-2">
          <a href="https://docs.wp-rocket.me/article/1489-use-http-2">Use HTTP/2</a>
        </li>`,
        destination: 'out-of-scope',

    },
    {
        id: 'third-party-facades',
        name: 'Lazy load third-party resources with facades',
        content: `
        <li class="third-party-facades">
            <p><span style="font-weight: bold;"><b>Lazy load third-party resources with facades</b></span><br>This audit highlights third-party embeds which can be lazyloaded. Please read: <a href="https://docs.wp-rocket.me/article/1458-lazy-load-third-party-resources-with-facades">https://docs.wp-rocket.me/article/1458-lazy-load-third-party-resources-with-facades</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    {
        id: 'unsized-images',
        name: 'Image elements do not have explicit width and height',
        content: `
        <li class="unsized-images">
            <p><span style="font-weight: bold;"><b>Image elements do not have explicit width and height</b></span><br>Images and/or videos that do not have width and height attributes can cause layout shifts as your page loads. You can enable <a href="https://docs.wp-rocket.me/article/1366-add-missing-image-dimensions">Add Missing Image Dimensions</a> option in WP Rocket to improve this. Please read: <a href="https://docs.wp-rocket.me/article/1471-image-elements-do-not-have-explicit-width-and-height">https://docs.wp-rocket.me/article/1471-image-elements-do-not-have-explicit-width-and-height</a><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },

    {
        id: 'preload-lcp-image',
        name: 'Preload Largest Contentful Paint image',
        content: `
        <li class="preload-lcp-image">
            <p><span style="font-weight: bold;"><b>Preload Largest Contentful Paint image</b></span><br>[EDIT THIS]The image <em>https://yourdomain.com/your-lcp-image.jpg</em> is being flagged as the <a href="https://docs.wp-rocket.me/article/1387-largest-contentful-paint">Largest Contentful Paint element</a> and, according to the recommendations, it should be preloaded in order to improve the performance.<br>To achieve this you can follow these steps:<ol><li>Install the Insert Headers and Footers plugin.</li><li>Add the code: <em>&lt;link rel=&quot;preload&quot; href=&quot;https://yourdomain.com/your-lcp-image.jpg&quot; as=&quot;image&quot;&gt;</em> in the Scripts in Header text area.</li><li>Clear WP Rocket's cache.</li></ol><br><br>
            </p>
        </li>`,
        destination: 'can-advise',

    },
    // {
    //     id: makeId(''),
    //     name: '',
    //     content: ``,
    // }
];

// psi_database = psi_database.map((element) => {
//     element.id = makeId(element.name);
//     return element;
// });
psi_database = sortObjectsArray(psi_database, 'name');
// console.log(window.psi_database);
// console.log(psi_database);
