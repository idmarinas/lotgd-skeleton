const coreFilesFolder = '_core_files'
//-- Modify with your data

module.exports = {
    files: {
        //-- Copy core files
        core_files: [
            //-- All files including subdirectories
            `${coreFilesFolder}/**`,
            `!${coreFilesFolder}/public/build{,/**}`, // This is regenerate for custom version
            `!${coreFilesFolder}/composer{.json,.lock}`, // Use custom versions
            `!${coreFilesFolder}/README.md`, // Not is necesary
            `!${coreFilesFolder}/vendor{,/**}` // This folder is regenerate for custom version
        ]
    }
}
