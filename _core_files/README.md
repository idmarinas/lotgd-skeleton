# How work this folder
Download the latest release from [https://github.com/idmarinas/lotgd-game/tree/master/release](https://github.com/idmarinas/lotgd-game/tree/master/release) and copy all files to this folder

> Note:
>
> Content that can delete/not copy:
>
>   -   `_core_files/public/build` folder, this re-generate for your version.
>   -   `_core_files/vendor/` folder, this re-generate for your version. 

Once you want to build your game for production use the following command:
```bash
npm run lotgd-prod
```
This will create the `dist/prod/` folder in the project's root directory. These files are the ones you have to upload to your server.
