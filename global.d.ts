const _global = (window /* browser */ || global /* node */) as any
declare function $(a: any): any;
// declare var psi_database: any;

_global.$ = $;
// _global.psi_database = psi_database;