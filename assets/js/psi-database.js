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
            <p><span style="font-weight: bold;"><b>Defer offscreen images</b></span><br>Our <a href="https://docs.wp-rocket.me/category/32-lazyload">LazyLoad for Images</a> feature can usually help with this.<br><br>

                But do keep in mind that while our LazyLoad feature now targets background images, it looks for <a href="https://docs.wp-rocket.me/article/1141-using-lazyload-in-wp-rocket#background-images">a very specific markup set</a>.<br><br>

                In some cases where our LazyLoad cannot be automatically be applied to a given image, you may be able to <a href="https://docs.wp-rocket.me/article/130-manually-apply-lazyload-to-an-image">apply it manually instead</a>. For those images, you can either add them in a way that matched the targeted markup or focus on optimizing their size and extension.
            </p>
        </li>`,
    },
    {
        name: 'Avoid an excessive DOM size',
        content: `
        <li class="avoid-an-excessive-dom-size ">
            <p><span style="font-weight: bold;"><b>Avoid an excessive DOM size</b></span><br>This is something you would have to address directly through the design of your site.<br><br>

                A DOM element is something like a DIV, HTML, BODY, etc. element on a page -- in other words, these have to do with the HTML structure of your pages, so you'd have to actually change that structure outside WP Rocket in order to satisfy this suggestion.</p>
        </li>
        `,
    },
    {
        name: 'Avoid serving legacy JavaScript to modern browsers',
        content: `
        <li class="avoid-serving-legacy-javascript-to-modern-browsers ">
        <p><span style="font-weight: bold;"><b>Avoid serving legacy JavaScript to modern browsers</b></span><br>You should check the JavaScript files listed in this recommendation and send the following request to the respective plugin/theme/external service support team:<br><br>

            <em>"Polyfills and transforms enable legacy browsers to use new JavaScript features. However, many aren't necessary for modern browsers. For your bundled JavaScript, adopt a modern script deployment strategy using module/nomodule feature detection to reduce the amount of code shipped to modern browsers, while retaining support for legacy browsers."</em><br><br>

            This isn’t something that WP Rocket can work on at the moment. It basically means your site is using old JavaScript rules for browsers that don’t need them, and this should be avoided.<br><br>

            This Opportunity is somewhat hard to accomplish but since its impact may not be noticeable for the visitor experience you could safely discard it.</p>
    </li>
        `,
    },
    {
        name: 'Eliminate render blocking resources',
        content: `
        <li class="eliminate-render-blocking-resources ">
        <p><span style="font-weight: bold;"><b>Eliminate render blocking resources</b></span><br>Enable the <span style="font-weight: bold;"><b>Optimize CSS delivery</b></span> feature in the File Optimizations tab, and wait for the success message in the WP Rocket settings page in order to be sure it was applied to your site.</p>
    </li>
        `,
    },
    {
        name: 'Minify CSS',
        content: `
        <li class="minify-css ">
        <p><span style="font-weight: bold;"><b>Minify CSS</b></span><br>Minifying CSS files basically consists in removing the comments and spaces that were added to the CSS files for readability purposes, making the CSS files smaller.<br><br>

            Reducing the size of the CSS files translates into data savings for your website’s visitors.

            With WP Rocket, you can easily address this opportunity by enabling <a href="https://docs.wp-rocket.me/article/1350-css-minify-combine">Minify CSS files</a> in the File Optimization tab.

            You can also find more information in Google’s official article, <a href="https://web.dev/unminified-css/">Minify CSS</a>.
        </p>
    </li>
        `,
    },
    {
        name: 'Minify JavaScript',
        content: `
        <li class="minify-javascript ">
        <p><span style="font-weight: bold;"><b>Minify JavaScript</b></span><br>JavaScript minification consists on removing the unnecessary information from the scripts, things like spacing and developer comments are deleted when files are minified.

            The goal of JavaScript minification is to decrease the parsing time and reduce the size of the scripts that need to be downloaded when visiting your website.

            WP Rocket’s <a href="https://docs.wp-rocket.me/article/1351-javascript-minify-combine">Minify JavaScript files</a> feature in the File Optimization tab should take care of this recommendation very easily.

            Please check Google’s article on <a href="https://web.dev/unminified-javascript/">Minify JavaScript</a>.
        </p>
    </li>
        `,
    },
    {
        name: 'Properly size images',
        content: `
        <li class="properly-size-images ">
        <p><span style="font-weight: bold;"><b>Properly size images</b></span><br>This means you're using images that are bigger than the space in which they are displayed, forcing the browser to resize them.<br>
            So, the way to solve the problem would be to use images that are exactly the same size as they are presented in the various sections of your page.</p>
    </li>
        `,
    },
    {
        name: 'Preload key requests',
        content: `
        <li class="preload-key-requests ">
        <p><span style="font-weight: bold;"><b>Preload key requests</b></span><br> According to what Google explains <a href="https://developers.google.com/web/tools/lighthouse/audits/preload">here</a> they want you to add <em>rel=preload</em> attribute to the LINK tag.<br><br>

            For font files, since WP Rocket v3.6, you can add them in the <span style="font-weight: bold;"><b>Preload Fonts</b></span> section (from the Preload tab: https://share.getcloudapp.com/qGuK8J9w).<br><br>

            You can find more info about how to use the feature in <a href="https://docs.wp-rocket.me/article/1317-preload-fonts">this link</a>.</p>
    </li>
        `,
    },
    {
        name: 'Remove unused JavaScript',
        content: `
        <li class="remove-unused-javascript ">
        <p><span style="font-weight: bold;"><b>Remove unused JavaScript</b></span><br>Our feature, <span style="font-weight: bold;"><b><em>Delay JavaScript Execution</em></b></span> can help. By delaying the files, PageSpeed will no longer warn you about them. However, not every file can be safely delayed. You should only delay files which are not needed for anything “above the fold”. <a href="https://docs.wp-rocket.me/article/1349-delay-javascript-execution">Please see this doc</a>.<br>

            Alternatively, the following plugins can help you to minimize unused JS from your pages. Please use them with care and consult your developer if you need help.<br>
            <ul>
                <li>https://wordpress.org/plugins/plugin-organizer/</li>
                <li>https://wordpress.org/plugins/wp-asset-clean-up/</li>
                <li>https://tomasz-dobrzynski.com/wordpress-gonzales</li>
            </ul>
        </p>
    </li>
        `,
    },
    {
        name: 'Remove unused CSS',
        content: `
        <li class="remove-unused-css ">
        <p><span style="font-weight: bold;"><b>Remove unused CSS</b></span><br>The description for "Remove unused CSS" says, <em>"Remove unused rules from stylesheets to reduce unnecessary bytes consumed by network activity"</em>.<br><br>

            When you're using pre-built WordPress themes and plugins, they will typically contain more code than is necessary for each page because the author cannot predict how the user will build their site. For example, the homepage might have grids showing the latest posts, but inner pages might not have this. But homepage and inner pages often have the same stylesheet. Which means, CSS for a different page will have to be loaded on the homepage and vice versa.<br><br>

            It's almost impossible to automate this accurately, and difficult to do even by hand. This article explains all the reasons why:<br>
            https://css-tricks.com/how-do-you-remove-unused-css-from-a-site/

            By activating the <span style="font-weight: bold;"><b>Optimize CSS Delivery</b></span> option, WP Rocket defers the loading of CSS, but we cannot remove the unused parts.<br><br>

            To truly satisfy this recommendation you would have to custom-code your site.
        </p>
    </li>
        `,
    },
    {
        name: 'Serve images in next-gen formats',
        content: `
        <li class="serve-images-in-next-gen-formats ">
        <p><span style="font-weight: bold;"><b>Serve images in next-gen formats</b></span><br>You can consider converting images to WebP format with some plugins. Depending on the settings in the image optimization plugin you may or may not need to activate WebP cache in WP Rocket. Here are more details on that: <a href="https://docs.wp-rocket.me/article/1282-webp">WebP Compatibility</a>

            We have built-in compatibility with <a href="https://wordpress.org/plugins/imagify/">Imagify plugin</a> and some other. Sometimes the plugin can deliver the WebP images itself. In this case, you don't need to activate WebP cache option in WP Rocket.</p>
    </li>
        `,
    },
    {
        name: 'Serve static assets with an efficient cache policy',
        content: `
        <li class="serve-static-assets-with-an-efficient-cache-policy ">
        <p><span style="font-weight: bold;"><b>Serve static assets with an efficient cache policy</b></span><br>Try enabling:<br>
            <a href="https://docs.wp-rocket.me/article/1103-google-tracking-add-on">Google Tracking Add-On</a><br>
            <a href="https://docs.wp-rocket.me/article/1117-facebook-pixel-add-on">Facebook Pixel Add-On</a><br>
            They can be found in the Add-on tab in WP Rocket.</p>
    </li>
        `,
    },
    {
        name: 'Reduce initial Server Response Time',
        content: `
        <li class="reduce-initial-server-response-time ">
        <p><span style="font-weight: bold;"><b>Reduce initial Server Response Time</b></span><br>WP Rocket's page caching will definitely improve the server response time.<br><br>

            Serving the cache via our rewrite rules in the htaccess is the most optimal method. When the Separate cache file for mobile option is active, our rewrite rules are removed from the htaccess and the cache is served using PHP instead. Usually this doesn't make a noticeable difference but if there are any server problems, it won't be quite as fast.<br><br>

            So you should also experiment with that option to see if having it turned off makes any further improvement in the TTFB.<br><br>

            But otherwise, any remaining issues with TTFB would point to some other underlying issues beyond WP Rocket's control, such as:<br>
            - Server performance<br>
            - Slow code from the theme or another plugin<br>
            - Distance between the testing location and your server<br><br>

            We also have some extra tips here which may help:<br>
            https://docs.wp-rocket.me/article/103-my-website-is-slow</p>
    </li>
        `,
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