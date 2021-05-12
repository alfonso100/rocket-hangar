// full-page-screenshot does not exist in auditRefs
const PASS_THRESHOLD = 0.9;
const NEEDS_IMPROVEMENT_THRESHOLD = 0.5;
class PsiTool {
    static pass_threshold = PASS_THRESHOLD;
    static needs_improvement_threshold = NEEDS_IMPROVEMENT_THRESHOLD;
    _api_url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
    _api_key = 'AIzaSyAg8yVZHvk_-_TB-Cm7aoCFI7i8bK8ugMM'; // WP MEDIA API KEY (Production)
    _parameters = {
        locale: 'en_US',
        url: '',
        strategy: 'mobile',
    };
    /**
   * @param {string} url - The URL of the site that will be tested by PSI
   * @description Sets up the instance
   */
    constructor(url) {
        this._parameters.url = encodeURIComponent(url.trim());
    }
    async run() {
        const url = this.setUpQuery();
        const json = await (await fetch(url)).json();
        // See https://developers.google.com/speed/docs/insights/v5/reference/pagespeedapi/runpagespeed#response
        // to learn more about each of the properties in the response object.
        // @ts-ignore
        let audits = Object.values(json.lighthouseResult.audits);
        let auditRefs = this.auditRefsToObject(json.lighthouseResult.categories.performance.auditRefs);
        let mergeAudits = this.mergeAudits(audits, auditRefs);
        let opportunities = this.getOpportunities(audits);
        let diagnostics = this.getDiagnostics(audits);
        let finalResult = {
            performance_score: json.lighthouseResult.categories.performance.score,
            opportunities,
            diagnostics,
            passed: this.getPassed(audits),
            all_failed: [...opportunities, ...diagnostics],
        };
        return finalResult;
    }

    setUpQuery() {
        let query = `${this._api_url}?`;
        query += `key=${this._api_key}`;
        for (let key in this._parameters) {
            query += `&${key}=${this._parameters[key]}`;
        }
        return query;
    }
    /**
     * @param {any} audit
     */
    static showAsPassed(audit) {
        switch (audit.scoreDisplayMode) {
            case 'manual':
            case 'notApplicable':
            case 'informative': // These does not pass google's tests, but they are irrelevant (e.g. Keep requests count low) so I marked it as if they passed the test
                return true;
            case 'error':
                return false;
            case 'numeric':
            case 'binary':
            default:
                return Number(audit.score) >= PASS_THRESHOLD;
        }
    }
    /**
     * @param {any} audits
     * @param {any} auditRefs
     */
    mergeAudits(audits, auditRefs) {
        // @ts-ignore
        let mergedAudits = audits.map((/** @type {any} */ audit) => {
            if (auditRefs[audit.id]) {
                audit.auditRef = auditRefs[audit.id];
            }
            return audit;
        });
        return mergedAudits;
    }
    /**
     * @param {any} audits
     */
    getOpportunities(audits) {
        let opportunityAudits = audits
            .filter((/** @type {any} */ audit) => audit?.auditRef?.group === 'load-opportunities' && !PsiTool.showAsPassed(audit));
        return opportunityAudits;
    }
    /**
     * @param {any} audits
     */
    getDiagnostics(audits) {
        let diagnosticAudits = audits
            .filter((/** @type {any} */ audit) => audit?.auditRef?.group === 'diagnostics' && !PsiTool.showAsPassed(audit));
        return diagnosticAudits;
    }
    /**
     * @param {any} audits
     */
    getPassed(audits) {
        // Passed audits
        const passedAudits = audits
            .filter((/** @type {any} */ audit) => (audit?.auditRef?.group === 'load-opportunities' || audit?.auditRef?.group === 'diagnostics') &&
                PsiTool.showAsPassed(audit));
        return passedAudits;
    }
    /**
     * @param {any[]} auditRefs
     */
    auditRefsToObject(auditRefs) {
        let newAuditRefs = {};
        auditRefs.forEach(auditRef => {
            newAuditRefs[auditRef.id] = auditRef;
        });
        return newAuditRefs;
    }
    /**
     * @param {any} audits
     */
    auditsToObject(audits) {
        let newAudits = {};
        audits.forEach((/** @type {any} */ audit) => {
            newAudits[audit.id] = audit;
        });
        return newAudits;
    }
}

{
    // Testing the Class

    // const psiTool = new PsiTool('https://wp-rocket.me/');
    // psiTool.run();
}
